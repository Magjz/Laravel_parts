<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'Player';
    protected $fillable = [
        'firstname', 'lastname', 'age', 'height', 'victory_nb', 'team_id' 
    ];

}
