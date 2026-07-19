@extends('layouts.visitor')

@section('title', 'Gestion des catégories')

@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Gestion des catégories</h2>

        <a href="{{ route('categories.create') }}"
           class="btn btn-success">
            + Ajouter une catégorie
        </a>

    </div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom (FR)</th>
                <th>Nom (AR)</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($categories as $categorie)

            <tr>

                <td>{{ $categorie->id }}</td>

                <td>{{ $categorie->nom_fr }}</td>

                <td>{{ $categorie->nom_ar }}</td>

                <td>

                    <a href="{{ route('categories.edit', $categorie->id) }}"
                       class="btn btn-warning btn-sm">
                        Modifier
                    </a>

                    <form action="{{ route('categories.destroy', $categorie->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">

                             Supprimer

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="4" class="text-center">
                    Aucune catégorie.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection