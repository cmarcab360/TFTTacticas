<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        //Obtener los equipos meta ordenador por porcentaje de victorias
        $metaTeams = Team::where('meta', 1)->with('teamrow')->orderByRaw('(victories / num_match * 100) desc')->get();
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener los equipos del usuario actual filtrando por user_id
        $teams = Team::where('user_id', $userId)->where('meta', 0)->get();

        // Pasar la variable $teams a la vista
        return view('profile', compact('teams', 'metaTeams'));
    }
}
?>