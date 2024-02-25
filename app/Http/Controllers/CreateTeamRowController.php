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

        // Validación de campos
        $request->validate([
            'character_id' => 'required|integer',
            'team_id' => 'required|integer',
            'position' => 'required|integer'
        ]);      

        //Añade una nueva row con los datos introducidos en el formulario a la base de datos
        Teamrow::create([
            'character_id' => $request->input('character_id'),
            'team_id' => $request->input('team_id'),
            'position' => $request->input('position')
        ]);
   
        // Obtiene todas las filas del equipo con ese id
        $teamRows = Teamrow::where('team_id', $request->input('team_id'))->get();

        return redirect('/createRow')->with(compact('teamRows'));
        
    }
}
