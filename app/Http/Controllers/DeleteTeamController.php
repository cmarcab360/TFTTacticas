<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Teamrow;
use Illuminate\Http\Request;

class DeleteTeamController extends Controller
{
    //$team->foreign('team_id')->references('id')->on('teamrows')->onDelete('cascade');//Eliminación en cascada de las filas del equipo
    public function destroy(Request $request)
    {
        $team_id = $request->input('team_id');
        $team = Team::find($team_id);
        $teamrows = Teamrow::where('team_id', $team->id)->get();
        foreach($teamrows as $teamrow){
            //ddd($teamrow->id, $teamrow->position);
            $teamrow->delete();
        }
        $team->delete();
        
        return redirect('/profile')->with('success','Equipo eliminado');
    }
    
}
