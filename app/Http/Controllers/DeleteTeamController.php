<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Teamrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DeleteTeamController extends Controller
{
    //$team->foreign('team_id')->references('id')->on('teamrows')->onDelete('cascade');//Eliminación en cascada de las filas del equipo
    public function destroy(Request $request)
    {
        $team_id = $request->input('team_id');
        $team = Team::find($team_id);
        //Si el usuario no es administrador y el equipo es meta, no se puede eliminar
        if(Auth::user()->admin != 1 && $team->meta == 1){
            abort(Response::HTTP_FORBIDDEN);
        }
        $teamrows = Teamrow::where('team_id', $team->id)->get();
        foreach($teamrows as $teamrow){
            //ddd($teamrow->id, $teamrow->position);
            $teamrow->delete();
        }
        $team->delete();
        
        return redirect('/profile')->with('success','Equipo eliminado');
    }
    
}
