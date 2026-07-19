<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\TexteJuridique;
use App\Models\Categorie;
use App\Models\Domaine;

class TexteJuridiqueController extends Controller
{
    /**
     * Afficher la liste des textes.
     */
    public function index()
    {
        $textes = TexteJuridique::with('categorie', 'domaine')->get();

        return view('admin.textes.index', compact('textes'));
    }

    /**
     * Afficher le formulaire d'ajout.
     */
    public function create()
    {
        $categories = Categorie::all();
        $domaines = Domaine::all();

        return view('admin.textes.create', compact('categories', 'domaines'));
    }

    /**
     * Enregistrer un nouveau texte.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre_fr' => 'required',
            'titre_ar' => 'required',
            'numero' => 'required|unique:textes_juridiques,numero',
            'date_publication' => 'required|date',
            'contenu_fr' => 'required',
            'contenu_ar' => 'required',
            'categorie_id' => 'required',
            'domaine_id' => 'required',
            'lien_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('lien_pdf')) {
            $data['lien_pdf'] = $request->file('lien_pdf')->store('pdfs', 'public');
        }

        TexteJuridique::create($data);

        return redirect()
            ->route('textes.index')
            ->with('success', 'Texte ajouté avec succès.');
    }

    /**
     * Afficher le formulaire de modification.
     */
    public function edit(string $id)
    {
        $texte = TexteJuridique::findOrFail($id);

        $categories = Categorie::all();
        $domaines = Domaine::all();

        return view('admin.textes.edit', compact(
            'texte',
            'categories',
            'domaines'
        ));
    }

    /**
     * Mettre à jour un texte.
     */
    public function update(Request $request, string $id)
    {
        $texte = TexteJuridique::findOrFail($id);

        $data = $request->validate([
            'titre_fr' => 'required',
            'titre_ar' => 'required',
            'numero' => 'required|unique:textes_juridiques,numero,' . $texte->id,
            'date_publication' => 'required|date',
            'contenu_fr' => 'required',
            'contenu_ar' => 'required',
            'categorie_id' => 'required',
            'domaine_id' => 'required',
            'lien_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);

        if ($request->hasFile('lien_pdf')) {

            if ($texte->lien_pdf) {
                Storage::disk('public')->delete($texte->lien_pdf);
            }

            $data['lien_pdf'] = $request->file('lien_pdf')->store('pdfs', 'public');
        }

        $texte->update($data);

        return redirect()
            ->route('textes.index')
            ->with('success', 'Texte modifié avec succès.');
    }

    public function show(string $id)
    {
        //
    }

   /**
 * Supprimer un texte.
 */
public function destroy(string $id)
{
    $texte = TexteJuridique::findOrFail($id);

    // Supprimer le fichier PDF s'il existe
    if ($texte->lien_pdf) {
        Storage::disk('public')->delete($texte->lien_pdf);
    }

    // Supprimer le texte
    $texte->delete();

    return redirect()
        ->route('textes.index')
        ->with('success', 'Texte supprimé avec succès.');
}

}