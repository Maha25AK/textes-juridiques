<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    public function index()
    {
        $domaines = Domaine::all();

        return view('admin.domaines.index', compact('domaines'));
    }

    public function create()
    {
        return view('admin.domaines.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
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

       return view('admin.domaines.edit', compact('domaine'));
    }

   public function update(Request $request, string $id)
   {
        $domaine = Domaine::findOrFail($id);

        $data = $request->validate([
            'nom_fr' => 'required|max:255',
            'nom_ar' => 'required|max:255',
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