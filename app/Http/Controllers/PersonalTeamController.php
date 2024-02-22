<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Teamrow;
use App\Http\Controllers\Controller;

class PersonalTeamController extends Controller
{
    public function personalTeam()
    {
        // Obtener las columnas deseadas de las tablas 'teams' y 'teamrows'
        $teams = Team::where('meta', 0)
            ->join('teamrows', 'teams.id', '=', 'teamrows.team_id')
            ->get(['teams.victories', 'teams.num_match', 'teamrows.position', 'teamrows.item1', 'teamrows.item2', 'teamrows.item3']);

        // Pasar la variable $teams a la vista
        return view('teams.personalTeam', compact('teams'));
    }
}
?>