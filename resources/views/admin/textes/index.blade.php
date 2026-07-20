@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Gestion des textes juridiques</h2>

        <a href="{{ route('textes.create') }}" class="btn btn-primary">
            Ajouter un texte
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead>
            <tr>
                <th>N°</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Domaine</th>
                <th>Date</th>
                <th width="220">Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($textes as $texte)

            <tr>

                <td>{{ $texte->numero }}</td>

                <td>{{ $texte->titre_fr }}</td>

                <td>{{ $texte->categorie->nom_fr ?? '-' }}</td>

                <td>{{ $texte->domaine->nom_fr ?? '-' }}</td>

                <td>{{ $texte->date_publication }}</td>

                <td>

                    <a href="{{ route('textes.show',$texte->id) }}"
                       class="btn btn-info btn-sm">
                        Voir
                    </a>

                    <a href="{{ route('textes.edit',$texte->id) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('textes.destroy',$texte->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Supprimer ce texte ?')">
                            Supprimer
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    Aucun texte trouvé.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection