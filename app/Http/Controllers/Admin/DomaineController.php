<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    public function index()
    {
        $domaines = Domaine::with('categorie')->get();

        return view('admin.domaines.index', compact('domaines'));
    }

    public function create()
    {
        $categories = Categorie::all();

        return view('admin.domaines.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Domaine::create($data);

        return redirect()
            ->route('domaines.index')
            ->with('success', 'Domaine ajouté avec succès.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $domaine = Domaine::findOrFail($id);
        $categories = Categorie::all();

        return view('admin.domaines.edit', compact('domaine', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        $domaine = Domaine::findOrFail($id);

        $data = $request->validate([
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $domaine->update($data);

        return redirect()
            ->route('domaines.index')
            ->with('success', 'Domaine modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $domaine = Domaine::findOrFail($id);

        $domaine->delete();

        return redirect()
            ->route('domaines.index')
            ->with('success', 'Domaine supprimé avec succès.');
    }
}