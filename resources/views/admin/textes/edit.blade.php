@extends('layouts.visitor')

@section('title', 'Modifier un texte')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>Modifier un texte juridique</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('textes.update', $texte->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Titre (FR)</label>
                    <input type="text"
                           name="titre_fr"
                           class="form-control"
                           value="{{ old('titre_fr', $texte->titre_fr) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Titre (AR)</label>
                    <input type="text"
                           name="titre_ar"
                           class="form-control"
                           value="{{ old('titre_ar', $texte->titre_ar) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Numéro</label>
                    <input type="text"
                           name="numero"
                           class="form-control"
                           value="{{ old('numero', $texte->numero) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Date de publication</label>
                    <input type="date"
                           name="date_publication"
                           class="form-control"
                           value="{{ old('date_publication', $texte->date_publication) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Catégorie</label>

                    <select name="categorie_id" class="form-select">

                        @foreach($categories as $categorie)

                            <option value="{{ $categorie->id }}"
                                {{ $texte->categorie_id == $categorie->id ? 'selected' : '' }}>
                                {{ $categorie->nom_fr }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label>Domaine</label>

                    <select name="domaine_id" class="form-select">

                        @foreach($domaines as $domaine)

                            <option value="{{ $domaine->id }}"
                                {{ $texte->domaine_id == $domaine->id ? 'selected' : '' }}>
                                {{ $domaine->nom_fr }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label>Contenu (FR)</label>

                    <textarea
                        name="contenu_fr"
                        rows="6"
                        class="form-control"
                        required>{{ old('contenu_fr', $texte->contenu_fr) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Contenu (AR)</label>

                    <textarea
                        name="contenu_ar"
                        rows="6"
                        class="form-control"
                        required>{{ old('contenu_ar', $texte->contenu_ar) }}</textarea>
                </div>

                <div class="mb-3">

                    <label>Nouveau PDF (optionnel)</label>

                    <input type="file"
                           name="lien_pdf"
                           class="form-control">

                </div>

                @if($texte->lien_pdf)

                    <div class="mb-3">
                        <a href="{{ asset('storage/'.$texte->lien_pdf) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">
                            Consulter le PDF actuel
                        </a>
                    </div>

                @endif

                <button type="submit" class="btn btn-warning">
                    Enregistrer les modifications
                </button>

                <a href="{{ route('textes.index') }}"
                   class="btn btn-secondary">
                    Annuler
                </a>

            </form>

        </div>

    </div>

</div>

@endsection