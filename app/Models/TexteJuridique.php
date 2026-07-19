<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TexteJuridique extends Model
{
    protected $table = 'textes_juridiques';

    protected $fillable = [
        'titre_fr',
        'titre_ar',
        'numero',
        'date_publication',
        'contenu_fr',
        'contenu_ar',
        'lien_pdf',
        'categorie_id',
        'domaine_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function domaine()
    {
        return $this->belongsTo(Domaine::class);
    }
}