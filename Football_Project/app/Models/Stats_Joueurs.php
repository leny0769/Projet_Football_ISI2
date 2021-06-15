<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats_Joueurs extends Model
{
    use HasFactory;

    public function joueurs(){
        return $this->belongsTo(Joueur::class);
    }
}
