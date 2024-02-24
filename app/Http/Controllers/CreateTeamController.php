<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;


class CreateTeamController extends Controller
{
    public function createTeam()
    {
        // Obtener todos los campeones desde la API 

        return view('create_team');
    }

    public function storeTeam(Request $request)
    {

        //Validacion de campos
        $request->validate([
            'team_name' => 'required|string|max:20',
            'victories' => 'integer',
            'num_match' => 'integer',
            'meta'=> 'required|boolean',
            'user_id' => 'required|integer'
        ]);
    
        // Crear un nuevo equipo en la base de datos
        $team = Team::create([
            'team_name' => $request->input('team_name'),
            'victories' => $request->input('victories'),
            'num_match' => $request->input('num_match'),
            'meta' => auth()->user()->admin ? 1 : 0, // si el usuario es admin el grupo es meta por defecto
            'user_id' => $request->input('user_id'), 

        ]);

        //$team = Team::create($attributes);
        //Propagación id equipo
        session(['team_id' => $team->id]);

        return redirect('/createRow');
        
    }
}
