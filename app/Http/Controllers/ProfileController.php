<?php

namespace App\Http\Controllers;

use App\Models\Team;

use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile()
    {
        // Obtener las columnas deseadas de las tablas 'teams' y 'teamrows'
        $teams = Team::where('meta', 0)->get(['team_name']);

        // Pasar la variable $teams a la vista
        return view('profile', compact('teams'));
    }
}
?>