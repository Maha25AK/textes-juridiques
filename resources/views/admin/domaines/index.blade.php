@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Liste des domaines</h2>

        <a href="{{ route('domaines.create') }}"
           class="btn btn-primary">
            Ajouter un domaine
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
                <th>ID</th>
                <th>Nom (FR)</th>
                <th>Nom (AR)</th>
                <th width="180">Actions</th>
            </tr>

        </thead>

        <tbody>

            @foreach($domaines as $domaine)

                <tr>

                    <td>{{ $domaine->id }}</td>

                    <td>{{ $domaine->nom_fr }}</td>

                    <td dir="rtl">{{ $domaine->nom_ar }}</td>

                    <td>

                        <a href="{{ route('domaines.edit', $domaine->id) }}"
                           class="btn btn-warning btn-sm">
                            Modifier
                        </a>

                        <form action="{{ route('domaines.destroy', $domaine->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Supprimer ce domaine ?')">
                                Supprimer
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection