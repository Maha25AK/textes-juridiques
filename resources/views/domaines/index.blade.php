@extends('layouts.visitor')

@section('title', $categorie->nom_fr)

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        Domaines - {{ $categorie->nom_fr }}
    </h2>

    <div class="list-group">

        @forelse($domaines as $domaine)

            <a href="{{ route('domaine.show', $domaine->id) }}"
               class="list-group-item list-group-item-action">

                {{ $domaine->nom_fr }}

            </a>

        @empty

            <div class="alert alert-warning">
                Aucun domaine trouvé.

            </div>

        @endforelse

    </div>

    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">
        ← Retour
    </a>

</div>

@endsection