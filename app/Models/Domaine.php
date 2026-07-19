<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Domaine extends Model
{
    protected $fillable = [
        'nom_fr',
        'nom_ar'
    ];

    public function categorie()
    {
       return $this->belongsTo(Categorie::class);
    }

    public function textesJuridiques()
    {
        return $this->hasMany(TexteJuridique::class);
    }
}