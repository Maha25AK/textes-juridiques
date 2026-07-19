<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Afficher la liste des catégories.
     */
    public function index()
    {
        $categories = Categorie::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
    * Afficher le formulaire d'ajout.
    */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
    * Enregistrer une nouvelle catégorie.
    */
    public function store(Request $request)
    {
       $data = $request->validate([
        'nom_fr' => 'required|max:255',
        'nom_ar' => 'required|max:255',
        ]);

        Categorie::create($data);

         return redirect()
           ->route('categories.index')
           ->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Afficher une catégorie.
     */
    public function show(string $id)
    {
        //
    }

    /**
    * Afficher le formulaire de modification.
    */
    public function edit(string $id)
    {
        $categorie = Categorie::findOrFail($id);

        return view('admin.categories.edit', compact('categorie'));
    }

    /**
    * Mettre à jour une catégorie.
    */
    public function update(Request $request, string $id)
    {
        $categorie = Categorie::findOrFail($id);

        $data = $request->validate([
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
        ]);

        $categorie->update($data);

            return redirect()
               ->route('categories.index')
               ->with('success', 'Catégorie modifiée avec succès.');
    }
    /**
    * Supprimer une catégorie.
    */
    public function destroy(string $id)
    {
         $categorie = Categorie::findOrFail($id);

         $categorie->delete();

         return redirect()
             ->route('categories.index')
             ->with('success', 'Catégorie supprimée avec succès.');
    }
}