@extends('layouts.visitor')

@section('title', $domaine->nom_fr)

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">{{ $domaine->nom_fr }}</h2>

    <table class="table table-hover">

        <thead>
            <tr>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Date</th>
                <th>PDF</th>
            </tr>
        </thead>

        <tbody>

        @foreach($textes as $texte)

            <tr>
                <td>{{ $texte->numero }}</td>
                <td>
                <a href="{{ route('texte.show', $texte->id) }}"
                 class="text-decoration-none">
                 {{ $texte->titre_fr }}
                </a>
                </td>
                <td>{{ $texte->date_publication }}</td>
                <td>
                    <a href="{{ asset($texte->lien_pdf) }}" target="_blank">
                        Consulter
                    </a>
                </td>
            </tr>

        @endforeach

        </tbody>

    </table>

</div>

@endsection