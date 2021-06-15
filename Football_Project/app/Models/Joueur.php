<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joueur extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'Prénom',
        'Nom',
        'Poste',
        'PiedFort',
        'Taille',
        'Poids',
        'DateNaissance',
        'VilleNaissance',
        'Nationalité',
        'PhotoURL',
        'TypeJoueur',
        'Numéro'
    ];

    public function clubs(){
        return $this->belongsTo(Club::class);
    }

    public function stats(){
        return $this->hasMany(Stats_Joueurs::class);
    }
}
