@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Ajouter un domaine</h2>

    <form action="{{ route('domaines.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Nom (Français)</label>
            <input type="text" name="nom_fr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom (Arabe)</label>
            <input type="text" name="nom_ar" class="form-control" dir="rtl" required>
        </div>

        <button type="submit" class="btn btn-primary">
            Ajouter
        </button>

        <a href="{{ route('domaines.index') }}" class="btn btn-secondary">
            Annuler
        </a>

    </form>

</div>

@endsection