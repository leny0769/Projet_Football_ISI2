<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Championnat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'saison_id',
        'Nom',
        'Type',
        'Format',
        'Clé'
    ];

    public function pays(){
        return $this->belongsTo(Pays::class);
    }

}
