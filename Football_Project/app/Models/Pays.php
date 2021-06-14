<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;

    public $table = 'pays';
    public $timestamps = false;
    protected $fillable = [
        'Clé',
        'Nom',
        'DrapeauURL'
    ];

    public function championnats(){
        return $this->hasMany(Championnat::class);
    }
}
