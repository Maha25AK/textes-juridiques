@extends('layouts.visitor')

@section('title', 'Ajouter un texte juridique')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Ajouter un texte juridique</h2>

    <form action="{{ route('textes.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Titre (Français)</label>
            <input type="text" name="titre_fr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Titre (Arabe)</label>
            <input type="text" name="titre_ar" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Numéro</label>
            <input type="text" name="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de publication</label>
            <input type="date" name="date_publication" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="categorie_id" class="form-select" required>
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">
                        {{ $categorie->nom_fr }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Domaine</label>
            <select name="domaine_id" class="form-select" required>
                <option value="">-- Choisir un domaine --</option>
                @foreach($domaines as $domaine)
                    <option value="{{ $domaine->id }}">
                        {{ $domaine->nom_fr }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenu (Français)</label>
            <textarea name="contenu_fr" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Contenu (Arabe)</label>
            <textarea name="contenu_ar" class="form-control" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Fichier PDF</label>
            <input type="file" name="lien_pdf" class="form-control" accept=".pdf">
        </div>

        <button type="submit" class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('textes.index') }}" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection