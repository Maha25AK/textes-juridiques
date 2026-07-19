<?php

namespace App\Http\Controllers;

use App\Models\Domaine;
use App\Models\TexteJuridique;

class TexteJuridiqueController extends Controller
{
    /**
     * Afficher les textes d'un domaine.
     */
    public function index($id)
    {
        $domaine = Domaine::with('textesJuridiques')->findOrFail($id);

        return view('textes.index', [
            'domaine' => $domaine,
            'textes' => $domaine->textesJuridiques
        ]);
    }

    /**
     * Afficher les détails d'un texte juridique.
     */
    public function show($id)
    {
        $texte = TexteJuridique::with('categorie', 'domaine')
                    ->findOrFail($id);

        return view('textes.show', compact('texte'));
    }
}