@extends('layouts.admin')

@section('title', 'Modifier une catégorie')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Modifier une catégorie
    </h2>

    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nom (Français)
            </label>

            <input
                type="text"
                name="nom_fr"
                class="form-control"
                value="{{ $categorie->nom_fr }}"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Nom (Arabe)
            </label>

            <input
                type="text"
                name="nom_ar"
                class="form-control"
                value="{{ $categorie->nom_ar }}"
                required>

        </div>

        <button type="submit" class="btn btn-primary">
            Modifier
        </button>

        <a href="{{ route('categories.index') }}"
           class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection