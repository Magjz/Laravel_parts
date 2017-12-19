<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $table = 'Team';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'department', 'flag', 'rank', 'rating', 'nbr_player'
    ];


    protected function show($id)
    {
        $team = self::findOrFail($id);
        return $team;
    }
}
