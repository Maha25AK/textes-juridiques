@extends('layouts.admin')

@section('title', __('messages.add_category'))

@section('content')

<div class="container mt-5">

    <h2 class="mb-4">{{ __('messages.add_category') }}</h2>

    <form action="{{ route('categories.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">
                {{ __('messages.name_french') }}
            </label>

            <input
                type="text"
                name="nom_fr"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                {{ __('messages.name_arabic') }}
            </label>

            <input
                type="text"
                name="nom_ar"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-success">
            {{ __('messages.save') }}
        </button>

        <a href="{{ route('categories.index') }}" class="btn btn-secondary">
            {{ __('messages.cancel') }}
        </a>

    </form>

</div>

@endsection