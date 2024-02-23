<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamrow extends Model
{
    use HasFactory;

    protected $fillable = ['team_id', 'character_id', 'position'];


    public function team(){
        return $this->belongsTo(Team::class, 'id');
    }
}
