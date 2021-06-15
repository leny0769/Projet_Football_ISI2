<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    //public $table = 'pays';
    public $timestamps = false;
   

    public function championnats(){
        return $this->hasMany(Championnat::class);
    }
}
