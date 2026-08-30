@extends('layouts.admin')

@section('content')

<div class="container">

    <h2 class="mb-4">{{ __('messages.add_domain') }}</h2>

    <form action="{{ route('domaines.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('messages.name_fr_full') }}</label>
            <input type="text" name="nom_fr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.name_ar_full') }}</label>
            <input type="text" name="nom_ar" class="form-control" dir="rtl" required>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.category') }}</label>

            <select name="categorie_id" class="form-select" required>

                <option value="">-- {{ __('messages.choose_category') }} --</option>

                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">
                        {{ app()->getLocale() == 'ar'
                            ? $categorie->nom_ar
                            : $categorie->nom_fr }}
                    </option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ __('messages.add') }}
        </button>

        <a href="{{ route('domaines.index') }}" class="btn btn-secondary">
            {{ __('messages.cancel') }}
        </a>

    </form>

</div>

@endsection