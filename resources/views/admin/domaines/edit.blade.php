@extends('layouts.admin')

@section('title', __('messages.edit_domain'))

@section('content')

<div class="container">

    <h2 class="mb-4">
        {{ __('messages.edit_domain') }}
    </h2>

    <form action="{{ route('domaines.update', $domaine->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">
                {{ __('messages.name_fr_full') }}
            </label>

            <input
                type="text"
                name="nom_fr"
                class="form-control"
                value="{{ old('nom_fr', $domaine->nom_fr) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('messages.name_ar_full') }}
            </label>

            <input
                type="text"
                name="nom_ar"
                class="form-control"
                dir="rtl"
                value="{{ old('nom_ar', $domaine->nom_ar) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('messages.category') }}
            </label>

            <select name="categorie_id" class="form-select" required>

                @foreach($categories as $categorie)

                    <option value="{{ $categorie->id }}"
                        {{ $domaine->categorie_id == $categorie->id ? 'selected' : '' }}>

                        {{ app()->getLocale() == 'ar'
                            ? $categorie->nom_ar
                            : $categorie->nom_fr }}

                    </option>

                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-warning">
            {{ __('messages.edit') }}
        </button>

        <a href="{{ route('domaines.index') }}"
           class="btn btn-secondary">
            {{ __('messages.cancel') }}
        </a>

    </form>

</div>

@endsection