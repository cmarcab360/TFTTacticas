<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile()
    {
        // Obtener el ID del usuario autenticado
        $userId = Auth::id();

        // Obtener los equipos del usuario actual filtrando por user_id
        $teams = Team::where('user_id', $userId)->where('meta', 0)->get();

        // Pasar la variable $teams a la vista
        return view('profile', compact('teams'));
    }
}
?>