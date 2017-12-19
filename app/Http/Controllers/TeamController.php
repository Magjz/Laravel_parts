<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
      
        return view('Team.Index')->with(['team' => $team]);
    }

    public function show($id)
    {
        $team = Team::show($id);
        
       return view('Team.Show')->with(['team' => $team]);
    }

    public function stat()
    {

    }
}
