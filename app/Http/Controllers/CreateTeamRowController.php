<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Teamrow;

class CreateTeamRowController extends Controller
{
    public function createRow()
    {
        return view('create_Row');
    }   

    public function storeRow(Request $request)
    {
        //Se recupera el ultimo id del team creado
        $team_id = session('team_id');

        // Validación de campos
        $request->validate([
            'character_id' => 'required|integer',
            'team_id' => 'required|integer',
            'position' => 'required|integer'
        ]);      

        // Crear un nueva linea del equipo
        Teamrow::create([
            'character_id' => $request->input('character_id'),
            'team_id' => $request->input('team_id'),
            'position' => $request->input('position')
        ]);
   

        return redirect('/');
        
    }
}
