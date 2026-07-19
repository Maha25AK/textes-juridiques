<?php

namespace App\Http\Controllers;

use App\Models\Categorie;

class DomaineController extends Controller
{
    public function index($id)
    {
        $categorie = Categorie::with('domaines')->findOrFail($id);

        return view('accueil', [
            'categorie' => $categorie,
            'domaines' => $categorie->domaines
        ]);
    }
}