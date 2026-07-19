@extends('layouts.visitor')

@section('content')

<div class="container">

    <h2 class="mb-4">Modifier un domaine</h2>

    <form action="{{ route('domaines.update', $domaine->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom (Français)</label>
            <input
                type="text"
                name="nom_fr"
                class="form-control"
                value="{{ old('nom_fr', $domaine->nom_fr) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom (Arabe)</label>
            <input
                type="text"
                name="nom_ar"
                class="form-control"
                dir="rtl"
                value="{{ old('nom_ar', $domaine->nom_ar) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>

            <select name="categorie_id" class="form-select" required>

                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}"
                        {{ $domaine->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom_fr }}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-warning">
            Modifier
        </button>

        <a href="{{ route('domaines.index') }}" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection