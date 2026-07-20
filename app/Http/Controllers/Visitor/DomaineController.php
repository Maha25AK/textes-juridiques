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

        $domaines = Domaine::where('categorie_id', $id)->get();

        return view('domaines.index', compact('categorie', 'domaines'));
    }
}