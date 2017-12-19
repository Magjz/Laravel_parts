<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Match;

class MatchController extends Controller
{
  public function index ()
  {
    $team1 = Match::matches_to_come();
    $team2 = Match::matches_past();
    return view("match.index", compact('team1','team2'));

    //return view('match.index',['team1' => $team1]);

    //dd($team1, $team2);
  }

  public function show($id)
  {
  $team = Match::show($id);
   return view('match.show')->with(['team' => $team]);
  }

  public function stat ()
  {
    $team1 = Match::joint();
    return view('match.stat')->with(['team1' => $team1]);
  }
}
