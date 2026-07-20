@extends('layouts.visitor')

@section('title', 'Accueil')

@section('content')

<section class="hero">

    <h1>PORTAIL DES TEXTES JURIDIQUES</h1>

    <p>
        Consultez les lois, décrets, arrêtés et circulaires publiés
        par le Ministère de l'Aménagement du Territoire, de l'Urbanisme,
        de l'Habitat et de la Politique de la Ville.
    </p>

    <form action="{{ route('home') }}" method="GET" class="mt-4">

        <div class="input-group w-50 mx-auto">

            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="Rechercher par numéro ou titre..."
                value="{{ request('q') }}">

            <button class="btn btn-primary">
                Rechercher
            </button>

        </div>

    </form>

</section>

<section class="container mt-5">

    <h2 class="text-center mb-4">
        Catégories
    </h2>

    <div class="list-group w-50 mx-auto">

        @foreach($categories as $categorie)

            <a href="{{ route('categorie.show', $categorie->id) }}"
               class="list-group-item list-group-item-action">

                {{ $categorie->nom_fr }}

            </a>

        @endforeach

    </div>

</section>

@if(isset($categorie) && isset($domaines))

<section class="container mt-5">

    <h2 class="text-center mb-4">
        {{ $categorie->nom_fr }}
    </h2>

    <div class="list-group w-50 mx-auto">

        @foreach($domaines as $domaine)

            <a href="{{ route('domaine.show', $domaine->id) }}"
               class="list-group-item list-group-item-action">

                {{ $domaine->nom_fr }}

            </a>

        @endforeach

    </div>

</section>

@endif

@if(isset($textes) && request()->filled('q'))

<section class="container mt-5">

    <h2 class="mb-4">
        Résultats de la recherche
    </h2>

    @if($textes->count())

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Numéro</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

                @foreach($textes as $texte)

                    <tr>

                        <td>{{ $texte->numero }}</td>

                        <td>
                            <a href="{{ route('texte.show', $texte->id) }}">
                                {{ $texte->titre_fr }}
                            </a>
                        </td>

                        <td>{{ $texte->categorie->nom_fr }}</td>

                        <td>{{ $texte->date_publication }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="alert alert-warning">
            Aucun texte trouvé.
        </div>

    @endif

</section>

@endif

<section class="top-textes">

    <h2>Les textes les plus consultés</h2>

    <ul>
        <li>Loi 12-90</li>
        <li>Décret 2-92-832</li>
        <li>Arrêté 15-95</li>
    </ul>

</section>

<section class="about">

    <h2>À propos du portail</h2>

    <p>
        Ce portail permet aux citoyens et aux professionnels
        de consulter facilement les textes juridiques.
    </p>

</section>

@endsection