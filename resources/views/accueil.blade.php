@extends('layouts.visitor')

@section('title', __('messages.home'))

@section('content')

<section class="hero">

    <h1>{{ __('messages.portal_title') }}</h1>

    <p>
        {{ __('messages.portal_description') }}
    </p>

    <form action="{{ route('home') }}" method="GET" class="mt-4">

        <div class="input-group w-50 mx-auto">

            <input
                type="text"
                name="q"
                class="form-control"
                placeholder="{{ __('messages.search_placeholder') }}"
                value="{{ request('q') }}">

            <button class="btn btn-primary">
                {{ __('messages.search') }}
            </button>

        </div>

    </form>

</section>

<section class="container mt-5">

    <h2 class="text-center mb-4">
        {{ __('messages.categories') }}
    </h2>

    <div class="list-group w-50 mx-auto">

        @foreach($categories as $categorie)

            <a href="{{ route('categorie.show', $categorie->id) }}"
               class="list-group-item list-group-item-action">

                @if(app()->getLocale() === 'ar')
                    {{ $categorie->nom_ar }}
                @else
                    {{ $categorie->nom_fr }}
                @endif

            </a>

        @endforeach

    </div>

</section>

@if(isset($categorie) && isset($domaines))

<section class="container mt-5">

    <h2 class="text-center mb-4">

        @if(app()->getLocale() === 'ar')
            {{ $categorie->nom_ar }}
        @else
            {{ $categorie->nom_fr }}
        @endif

    </h2>

    <div class="list-group w-50 mx-auto">

        @foreach($domaines as $domaine)

            <a href="{{ route('domaine.show', $domaine->id) }}"
               class="list-group-item list-group-item-action">

                @if(app()->getLocale() === 'ar')
                    {{ $domaine->nom_ar }}
                @else
                    {{ $domaine->nom_fr }}
                @endif

            </a>

        @endforeach

    </div>

</section>

@endif

@if(isset($textes) && request()->filled('q'))

<section class="container mt-5">

    <h2 class="mb-4">
        {{ __('messages.search_results') }}
    </h2>

    @if($textes->count())

        <table class="table table-hover">

            <thead>
                <tr>
                    <th>{{ __('messages.number') }}</th>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.category') }}</th>
                    <th>{{ __('messages.date') }}</th>
                </tr>
            </thead>

            <tbody>

                @foreach($textes as $texte)

                    <tr>

                        <td>{{ $texte->numero }}</td>

                        <td>
                            <a href="{{ route('texte.show', $texte->id) }}">

                                @if(app()->getLocale() === 'ar')
                                    {{ $texte->titre_ar }}
                                @else
                                    {{ $texte->titre_fr }}
                                @endif

                            </a>
                        </td>

                        <td>
                            @if(app()->getLocale() === 'ar')
                                {{ $texte->categorie->nom_ar }}
                            @else
                                {{ $texte->categorie->nom_fr }}
                            @endif
                        </td>

                        <td>{{ $texte->date_publication }}</td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    @else

        <div class="alert alert-warning">
            {{ __('messages.no_text_found') }}
        </div>

    @endif

</section>

@endif

<section class="top-textes">

    <h2>{{ __('messages.most_viewed') }}</h2>

    <ul>
        <li>Loi 12-90</li>
        <li>Décret 2-92-832</li>
        <li>Arrêté 15-95</li>
    </ul>

</section>

<section class="about">

    <h2>{{ __('messages.about_portal') }}</h2>

    <p>
        {{ __('messages.about_description') }}
    </p>

</section>

@endsection