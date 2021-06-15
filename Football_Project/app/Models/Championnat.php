<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championnat extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function pays(){
        return $this->belongsTo(Pays::class);
    }

    public function clubs()
    {
        return $this->belongsToMany(Club::class);
    }
}
