@extends('layouts.admin')

@section('title', 'Ajouter une catégorie')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">Ajouter une catégorie</h2>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nom (Français)</label>

            <input
                type="text"
                name="nom_fr"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom (Arabe)</label>

            <input
                type="text"
                name="nom_ar"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection