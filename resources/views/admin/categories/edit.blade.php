@extends('layouts.admin')

@section('title', __('messages.edit_category'))

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">
        {{ __('messages.edit_category') }}
    </h2>

    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">

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
                value="{{ $categorie->nom_fr }}"
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
                value="{{ $categorie->nom_ar }}"
                required>

        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('messages.edit') }}
        </button>

        <a href="{{ route('categories.index') }}"
           class="btn btn-secondary">
            {{ __('messages.cancel') }}
        </a>

    </form>

</div>

@endsection