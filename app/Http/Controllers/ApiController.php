<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $teams = Team::where('meta', 1)->with('teamrow')->get(['id','team_name','victories','num_match','meta']);
        return response()->json($teams);
    }
}
