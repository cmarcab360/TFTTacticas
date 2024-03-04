<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Teamrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeamController extends Controller
{
    //$team->foreign('team_id')->references('id')->on('teamrows')->onDelete('cascade');//Eliminación en cascada de las filas del equipo
    
    //Función que elimina un equipo(Tiene encuenta quien solicita la eliminación (administrador o no) y si el equipo es meta o no)
    public function destroy(Request $request)
    {
        $team_id = $request->input('team_id');
        $team = Team::find($team_id);
        //Si el usuario no es administrador y el equipo es meta, no se puede eliminar por un usuario que no sea administrador
        if(Auth::user()->admin != 1 && $team->meta == 1){
            abort(Response::HTTP_FORBIDDEN);
        }
        $teamrows = Teamrow::where('team_id', $team->id)->get();
        foreach($teamrows as $teamrow){
            //ddd($teamrow->id, $teamrow->position);
            $teamrow->delete();
        }
        $team->delete();
        
        return redirect('/profile')->with('success','Team deleted');
    }
    //Función que actualiza los campos victories y num_match de un equipo
    public function update(Request $request)
    {
        $team_id = $request->input('team_id');
        $team = Team::find($team_id);

        //Validacion de campos
        request()->validate([
            'victories' => 'required|integer',
            'num_match' => 'required|integer',
        ]);

        //Si el usuario no es administrador y el equipo es meta, no se puede updatear por un usuario que no sea administrador
        if(Auth::user()->admin != 1 && $team->meta == 1){
            abort(Response::HTTP_FORBIDDEN);
        }
        
        //Actualización de los campos victories y num_match
        $team->update([
            'victories' => $request->input('victories'),
            'num_match' => $request->input('num_match')
        ]);

        return redirect('/profile')->with('success','Team updated');
    }
}
