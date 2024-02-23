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

    public function storeTeam()
    {
        // Validación de campos
        $attributes = request()->validate([
            'team_name' => 'required|string|max:20',
            'victories' => 'integer',
            'num_match' => 'integer',
            'meta'=> 'required|boolean',
            'user_id' => 'required|integer'
        ]);
       
        // Crear un nuevo equipo en la base de datos
        $team = Team::create($attributes);
        //Propagación id equipo
        session(['team_id' => $team->id]);

        return redirect('/createRow');
        
    }
}
