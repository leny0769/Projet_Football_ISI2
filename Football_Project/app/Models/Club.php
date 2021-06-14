<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'Clé',
        'Nom',
        'NomComplet',
        'Ville',
        'SiteWeb',
        'DateFondation',
        'Couleur1',
        'Couleur2',
        'Couleur3',
        'Surnom1',
        'Surnom2',
        'Surnom3',
        'LogoURL',
        'stade_id'
    ];
}
