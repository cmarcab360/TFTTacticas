<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teamrow;

class CreateTeamRowController extends Controller
{
    public function createRow()
    {
        return view('create_row');
    }

    public function storeRow(Request $request)
    {
        // Validación de campos
        $request->validate([
            'character_id' => 'required|string',
            'team_id' => 'required|integer',
            'position' => 'required|integer|between:1,28'
        ]);

        // Verifica si ya existe una fila con la misma posición y diferente campeon
        $ExistePosicion = Teamrow::where('team_id', $request->input('team_id'))
            ->where('position', $request->input('position'))
            ->where('character_id', '<>', 'TFT10_' . $request->input('character_id'))
            ->first();

        // Si existe eliminar esa fila
        if ($ExistePosicion) {
            $ExistePosicion->delete();
        }

        // Verificar si ya existe una fila con el mismo campeon
        $existeCampeon = Teamrow::where('team_id', $request->input('team_id'))
            ->where('character_id', 'TFT10_' . $request->input('character_id'))
            ->first();

        // Si existe actualiza la posición
        if ($existeCampeon) {
            $existeCampeon->update([
                'position' => $request->input('position'),
            ]);
        } else {
            // Si no existe crear una nueva fila con los datos introducidos en el formulario a la base de datos
            Teamrow::create([
                'character_id' => 'TFT10_' . $request->input('character_id'),
                'team_id' => $request->input('team_id'),
                'position' => $request->input('position')
            ]);
        }

        //Si se le pasa un valor 'nulo' a una fila que ya tiene un campeon, el character_id pasa a llamarse nulo y luego se elimina
        $nulo = Teamrow::where('team_id', $request->input('team_id'))
            ->where('position', $request->input('position'))
            ->where('character_id', 'TFT10_nulo')
            ->first();

        if ($request->input('character_id') == 'nulo') {
            $nulo->delete();
        }

        // Obtiene todas las filas del equipo con ese id
        $teamRows = Teamrow::where('team_id', $request->input('team_id'))->get();

        return redirect('/createRow')->with(compact('teamRows'))->with('success', 'Campeón añadido');
    }
}
