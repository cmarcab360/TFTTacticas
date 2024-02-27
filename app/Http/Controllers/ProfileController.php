<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Teamrow;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener los equipos del usuario actual filtrando por user_id
        $teams = Team::where('user_id', $userId)->where('meta', 0)->get();

        $teamRows = Teamrow::where('team_id', $request->input('team_id'))->get();

        // Pasar la variable $teams a la vista
        return view('profile', compact('teams'));
    }
}
?>