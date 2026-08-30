@extends('layouts.admin')

@section('title', __('messages.edit_text'))

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning text-dark">
            <h3>{{ __('messages.edit_legal_text') }}</h3>
        </div>

        <div class="card-body">

            <form action="{{ route('textes.update', $texte->id) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>{{ __('messages.title_fr') }}</label>
                    <input type="text"
                           name="titre_fr"
                           class="form-control"
                           value="{{ old('titre_fr', $texte->titre_fr) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.title_ar') }}</label>
                    <input type="text"
                           name="titre_ar"
                           class="form-control"
                           dir="rtl"
                           value="{{ old('titre_ar', $texte->titre_ar) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.number') }}</label>
                    <input type="text"
                           name="numero"
                           class="form-control"
                           value="{{ old('numero', $texte->numero) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.publication_date') }}</label>
                    <input type="date"
                           name="date_publication"
                           class="form-control"
                           value="{{ old('date_publication', $texte->date_publication) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.category') }}</label>

                    <select name="categorie_id" class="form-select">

                        @foreach($categories as $categorie)

                            <option value="{{ $categorie->id }}"
                                {{ $texte->categorie_id == $categorie->id ? 'selected' : '' }}>

                                {{ app()->getLocale() == 'ar'
                                    ? $categorie->nom_ar
                                    : $categorie->nom_fr }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label>{{ __('messages.domain') }}</label>

                    <select name="domaine_id" class="form-select">

                        @foreach($domaines as $domaine)

                            <option value="{{ $domaine->id }}"
                                {{ $texte->domaine_id == $domaine->id ? 'selected' : '' }}>

                                {{ app()->getLocale() == 'ar'
                                    ? $domaine->nom_ar
                                    : $domaine->nom_fr }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="mb-3">
                    <label>{{ __('messages.content_fr') }}</label>

                    <textarea
                        name="contenu_fr"
                        rows="6"
                        class="form-control"
                        required>{{ old('contenu_fr', $texte->contenu_fr) }}</textarea>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.content_ar') }}</label>

                    <textarea
                        name="contenu_ar"
                        rows="6"
                        class="form-control"
                        dir="rtl"
                        required>{{ old('contenu_ar', $texte->contenu_ar) }}</textarea>
                </div>

                <div class="mb-3">

                    <label>{{ __('messages.new_pdf_optional') }}</label>

                    <input type="file"
                           name="lien_pdf"
                           class="form-control">

                </div>

                @if($texte->lien_pdf)

                    <div class="mb-3">
                        <a href="{{ asset('storage/'.$texte->lien_pdf) }}"
                           target="_blank"
                           class="btn btn-outline-primary btn-sm">

                            {{ __('messages.current_pdf') }}

                        </a>
                    </div>

                @endif

                <button type="submit" class="btn btn-warning">
                    {{ __('messages.save_changes') }}
                </button>

                <a href="{{ route('textes.index') }}"
                   class="btn btn-secondary">
                    {{ __('messages.cancel') }}
                </a>

            </form>

        </div>

    </div>

</div>

@endsection