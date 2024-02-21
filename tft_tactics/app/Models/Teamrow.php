<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teamrow extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'team_id', 'position', 'item1', 'item2', 'item3'];

    public function team(){
        return $this->belongsTo(Team::class, 'id');
    }
}
