<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Match;

class Match extends Model
{
  protected $table = 'Matches';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'team_id1', 'team_id2', 'nbr_fault', 'score_dom', 'score_ext', 'match_date', 'stadium', 'weather', 'stone'
  ];

  protected function matches_to_come()
  {
    $m1= DB::table('Matches')
    ->select('*')
    ->where('match_date','>',DB::raw('curdate()'))
    ->get();
    return $m1;
  }

  protected function matches_past()
  {
    $m2= DB::table('Matches')
    ->select('*')
    ->where('match_date','<=',DB::raw('curdate()'))
    ->get();
    return $m2;
  }

  protected function joint()
  {
    $join1= DB::table('Matches')
    ->join('Team as t1','Matches.team_id1','=','Team.id')
    ->join('Team as t2','Matches.team_id2','=','Team.id')
    ->select('t1.name','t2.name')
    ->get();
    return $join1;
  }

  protected function show($id)
  {
    $team = self::findOrFail($id);
    return $team;
  }
}
