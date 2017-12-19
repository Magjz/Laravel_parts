<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PlayerController extends Controller
{
    public function index()
    {
        $player = DB::table('Player')->join('Team', 'Team.id', '=', 'Player.team_id')->get();
        // dd($player);
        return view('Player.Index')->with(['player' => $player]);
    }
}
