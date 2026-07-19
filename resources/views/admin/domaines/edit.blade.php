@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Modifier un domaine</h2>

    <form action="{{ route('domaines.update', $domaine->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nom (Français)</label>
            <input type="text"
                   name="nom_fr"
                   class="form-control"
                   value="{{ $domaine->nom_fr }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom (Arabe)</label>
            <input type="text"
                   name="nom_ar"
                   class="form-control"
                   dir="rtl"
                   value="{{ $domaine->nom_ar }}"
                   required>
        </div>

        <button class="btn btn-success">
            Enregistrer
        </button>

        <a href="{{ route('domaines.index') }}"
           class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection