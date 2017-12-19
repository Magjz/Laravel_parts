<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Match;
use App\User;
use App\Team;
use App\Player;
use Illuminate\Support\Facades\DB;
//use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

/**
 * TEAM
 */
    public function team()
    {
        $team = Team::orderBy('created_at', 'desc')
                     ->get();
        return view("Admin.Team")->with(['team' => $team]);
    }

    public function teamDelete($id)
    {
        DB::table('Team')->where('id', '=', $id)->delete();
        return redirect("admin/team");
    }

    public function teamUpdate($id)
    {
        DB::table('Team')->where('id', '=', $id)
                         ->update(['name'       => request('name'), 
                                   'department' => request('department'),
                                   'flag'       => request('flag'), 
                                   'nbr_player' => request('nbr_player'),
                                 ]);
                              
        return back();
    }

    public function teamAdd()
    {  
        Team::create(['name'       => request('name'), 
                      'department' => request('department'),
                      'flag'       => request('flag'), 
                      'nbr_player' => request('nbr_player'), 
            ]);
        $message = "L'équipe a bien été ajoutée";
        return back()->with(['message' => $message]);
    }


/**
 * PLAYER
 */
    public function player()
    {
        $player = Player::select('Player.*', 'Team.name')
                        ->join('Team', 'Team.id', '=', 'Player.team_id')
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view("Admin.Player")->with(['player'=> $player]);
    }

    public function playerDelete($id)
    {
        DB::table('Player')->where('id', '=', $id)->delete();
        return redirect("admin/player");
    }

    public function playerUpdate($id)
    {
        DB::table('Player')->where('id', '=', $id)
                           ->update(['firstname' => request('firstname'), 
                                     'lastname'  => request('lastname'),
                                     'age'       => request('age'), 
                                     'height'    => request('height'),
                                     'pb'        => request('pb'), 
                                     'team_id'   => request('team_id')
                                    ]);
        return back();
    }

    public function playerAdd()
    {
        Player::create(['firstname' => request('firstname'), 
                        'lastname'  => request('lastname'),
                        'age'       => request('age'), 
                        'height'    => request('height'),
                        'pb'        => request('pb'), 
                        'team_id'   => request('team_id')
                        ]);
        $nb = DB::table('Team')->select('Team.nbr_player')
                               ->where('Team.id', '=', request('team_id') )
                               ->get();
        $new_nb = $nb[0]->nbr_player +1;
       
        DB::table('Team')
                        ->where('Team.id', '=', request('team_id'))
                        ->update(['Team.nbr_player' => $new_nb]);

        $message = 'Le joueur a bien été ajouté';
        return back()->with(['message' => $message]);
    }


/**
 * MATCH 
 */
    public function match()
    {
        $match = Match::orderBy('created_at', 'desc')
                        ->get();
        $team = Team::select('name')->get();
        return view("Admin.Match")->with(['match'=> $match, 'team' => $team]);
    }

    public function matchDelete($id)
    {
        DB::table('Matches')->where('id', '=', $id)->delete();
        return redirect("admin/match");
    }

    public function matchUpdate($id)
    {
        DB::table('Matches')->where('id', '=', $id)
                            ->update(['team_id1'   => request('team_id1'), 
                                      'team_id2'   => request('team_id2'),
                                      'nbr_fault'  => request('nbr_fault'), 
                                      'score_dom'  => request('score_dom'),
                                      'score_ext'  => request('score_ext'), 
                                      'stadium'    => request('stadium'),
                                      'match_date' => request('match_date'),
                                      'weather'    => request('weather'), 
                                      'stone'      => request('stone')
                                    ]);
        return back();
    }

    public function matchAdd()
    { 
        Match::create(['team_id1'   => request('team_id1'), 
                       'team_id2'   => request('team_id2'),
                       'nbr_fault'  => request('nbr_fault'), 
                       'score_dom'  => request('score_dom'),
                       'score_ext'  => request('score_ext'), 
                       'stadium'    => request('stadium'),
                       'match_date' => request('match_date'),
                       'weather'    => request('weather'), 
                       'stone'      => request('stone')
            ]);
        $message = 'Le match a bien été ajouté';
        return back()->with(['message' => $message]);

    }

/**
 * USER 
 */
   
    public function user()
    {
        $user = User::orderBy('created_at', 'desc')
                    ->get();
        return view("Admin.User")->with(['user' => $user]);
    }

    public function userDelete($id)
    { 
        DB::table('users')->where('id', '=', $id)->delete();
        return redirect("admin/user");
    }

    public function userUpdate($id)
    {
        DB::table('users')->where('id', '=', $id)
                          ->update(['name'  => request('name'), 
                                    'email' => request('email'),
                                 ]);
        return  back(); 
    }

    public function userAdd()
    {
       
        if($validator->fails())
        {
            return redirect('admin/user');
        }
        else
        { 
            User::create(['name'     => request('name'), 
                          'email'    => request('email'),
                          'password' => Hash::make(request('password'))
            ]);

            $message = "L'utilisateur a bien été ajouté !";
            return back()->with(['message' => $message]);
        }        
    }
}
