@extends('layouts.visitor')

@section('title', $texte->titre_fr)

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">{{ $texte->titre_fr }}</h2>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">
                    <strong>Numéro :</strong>
                    {{ $texte->numero }}
                </div>

                <div class="col-md-6">
                    <strong>Date de publication :</strong>
                    {{ $texte->date_publication }}
                </div>

            </div>

            <div class="row mb-4">

                <div class="col-md-6">
                    <strong>Catégorie :</strong>
                    {{ $texte->categorie->nom_fr }}
                </div>

                <div class="col-md-6">
                    <strong>Domaine :</strong>
                    {{ $texte->domaine->nom_fr }}
                </div>

            </div>

            <hr>

            <h4>🇫🇷 Contenu (Français)</h4>

            <div class="border rounded p-3 bg-light mb-4">
                {{ $texte->contenu_fr }}
            </div>

            <h4 class="text-end">🇲🇦 المحتوى بالعربية</h4>

            <div class="border rounded p-3 bg-light text-end" dir="rtl">
                {{ $texte->contenu_ar }}
            </div>

            @if($texte->lien_pdf)

                <div class="mt-4">

                    <a href="{{ asset('storage/' . $texte->lien_pdf) }}"
                       target="_blank"
                       class="btn btn-danger">

                        📄 Télécharger le PDF

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection