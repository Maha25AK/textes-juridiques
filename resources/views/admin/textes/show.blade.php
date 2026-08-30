@extends('layouts.admin')

@section('title', app()->getLocale() == 'ar' ? $texte->titre_ar : $texte->titre_fr)

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h2 class="mb-0">
                {{ app()->getLocale() == 'ar' ? $texte->titre_ar : $texte->titre_fr }}
            </h2>

        </div>

        <div class="card-body">

            <div class="row mb-4">

                <div class="col-md-6">
                    <strong>{{ __('messages.number') }} :</strong>
                    {{ $texte->numero }}
                </div>

                <div class="col-md-6">
                    <strong>{{ __('messages.publication_date') }} :</strong>
                    {{ $texte->date_publication }}
                </div>

            </div>

            <div class="row mb-4">

                <div class="col-md-6">
                    <strong>{{ __('messages.category') }} :</strong>
                    {{ app()->getLocale() == 'ar'
                        ? $texte->categorie->nom_ar
                        : $texte->categorie->nom_fr }}
                </div>

                <div class="col-md-6">
                    <strong>{{ __('messages.domain') }} :</strong>
                    {{ app()->getLocale() == 'ar'
                        ? $texte->domaine->nom_ar
                        : $texte->domaine->nom_fr }}
                </div>

            </div>

            <hr>

            @if(app()->getLocale() == 'ar')

                <h4>🇲🇦 {{ __('messages.content_ar') }}</h4>

                <div class="border rounded p-3 bg-light text-end"
                     dir="rtl">
                    {{ $texte->contenu_ar }}
                </div>

            @else

                <h4>🇫🇷 {{ __('messages.content_fr') }}</h4>

                <div class="border rounded p-3 bg-light">
                    {{ $texte->contenu_fr }}
                </div>

            @endif

            @if($texte->lien_pdf)

                <div class="mt-4">

                    <a href="{{ asset('storage/' . $texte->lien_pdf) }}"
                       target="_blank"
                       class="btn btn-danger">

                        📄 {{ __('messages.download_pdf') }}

                    </a>

                </div>

            @endif

        </div>

    </div>

</div>

@endsection