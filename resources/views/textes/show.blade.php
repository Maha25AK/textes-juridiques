@extends('layouts.visitor')

@section('title', $texte->titre_fr)

@section('content')

<div class="container mt-5">

    <h2>{{ $texte->titre_fr }}</h2>

    <hr>

    <p><strong>Numéro :</strong> {{ $texte->numero }}</p>

    <p><strong>Date de publication :</strong> {{ $texte->date_publication }}</p>

    <div class="mt-4">
        {!! nl2br(e($texte->contenu_fr)) !!}
    </div>

    <div class="mt-4">

        <a href="{{ asset($texte->lien_pdf) }}"
           target="_blank"
           class="btn btn-primary">

            Consulter le PDF

        </a>

    </div>

</div>

@endsection