<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'nom_fr',
        'nom_ar'
    ];

    public function domaines()
    {
        return $this->hasMany(Domaine::class);
    }
    public function textesJuridiques()
    {
    return $this->hasMany(TexteJuridique::class);
    }
}