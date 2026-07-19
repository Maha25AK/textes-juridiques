<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\TexteJuridique;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index(Request $request)
    {
        $categories = Categorie::all();

        $textes = TexteJuridique::with('categorie');

        if ($request->filled('q')) {
            $textes->where('numero', 'like', '%' . $request->q . '%')
                   ->orWhere('titre_fr', 'like', '%' . $request->q . '%');
        }

        return view('accueil', [
            'categories' => $categories,
            'textes' => $textes->get(),
        ]);
    }
}