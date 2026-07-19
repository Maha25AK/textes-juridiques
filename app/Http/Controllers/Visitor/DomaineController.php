<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Domaine;

class DomaineController extends Controller
{
    public function index($id)
    {
        $categorie = Categorie::findOrFail($id);

        $domaines = Domaine::whereHas('textesJuridiques', function ($query) use ($id) {
            $query->where('categorie_id', $id);
        })->get();

        return view('accueil', compact('categorie', 'domaines'));
    }
}