@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ __('messages.manage_legal_texts') }}</h2>

        <a href="{{ route('textes.create') }}" class="btn btn-primary">
            {{ __('messages.add_text') }}
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
                <th>{{ __('messages.number') }}</th>
                <th>{{ __('messages.title') }}</th>
                <th>{{ __('messages.category') }}</th>
                <th>{{ __('messages.domain') }}</th>
                <th>{{ __('messages.date') }}</th>
                <th width="220">{{ __('messages.actions') }}</th>
            </tr>
        </thead>

        <tbody>

        @forelse($textes as $texte)

            <tr>

                <td>{{ $texte->numero }}</td>

                <td>
                    {{ app()->getLocale() == 'ar'
                        ? $texte->titre_ar
                        : $texte->titre_fr }}
                </td>

                <td>
                    {{ app()->getLocale() == 'ar'
                        ? ($texte->categorie->nom_ar ?? '-')
                        : ($texte->categorie->nom_fr ?? '-') }}
                </td>

                <td>
                    {{ app()->getLocale() == 'ar'
                        ? ($texte->domaine->nom_ar ?? '-')
                        : ($texte->domaine->nom_fr ?? '-') }}
                </td>

                <td>{{ $texte->date_publication }}</td>

                <td>

                    <a href="{{ route('textes.show',$texte->id) }}"
                       class="btn btn-info btn-sm">
                        {{ __('messages.view') }}
                    </a>

                    <a href="{{ route('textes.edit',$texte->id) }}"
                       class="btn btn-warning btn-sm">
                        {{ __('messages.edit') }}
                    </a>

                    <form action="{{ route('textes.destroy',$texte->id) }}"
                          method="POST"
                          class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('{{ __('messages.confirm_delete_text') }}')">
                            {{ __('messages.delete') }}
                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="6" class="text-center">
                    {{ __('messages.no_texts') }}
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection