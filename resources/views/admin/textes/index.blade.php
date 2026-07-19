@extends('layouts.visitor')

@section('title', 'Gestion des textes')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Gestion des textes juridiques</h2>

        <a href="{{ route('textes.create') }}"
           class="btn btn-success">

            + Ajouter un texte

        </a>

    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

            <tr>
                <th>Numéro</th>
                <th>Titre</th>
                <th>Catégorie</th>
                <th>Domaine</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        @forelse($textes as $texte)

            <tr>

                <td>{{ $texte->numero }}</td>

                <td>{{ $texte->titre_fr }}</td>

                <td>{{ $texte->categorie->nom_fr }}</td>

                <td>{{ $texte->domaine->nom_fr }}</td>

                <td>

                    <a href="{{ route('textes.edit', $texte->id) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>
                        
                    

             <form action="{{ route('textes.destroy', $texte->id) }}"
                          method="POST"
                          class="d-inline">

                      @csrf
                      @method('DELETE')

                   <button type="submit"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Voulez-vous vraiment supprimer ce texte ?')">

                     Supprimer

                  </button>

             </form>
                        
                    

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center">
                    Aucun texte juridique.
                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection