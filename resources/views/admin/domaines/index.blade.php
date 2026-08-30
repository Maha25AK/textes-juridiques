@extends('layouts.visitor')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>{{ __('messages.domains_list') }}</h2>

        <a href="{{ route('domaines.create') }}"
           class="btn btn-primary">
            {{ __('messages.add_domain') }}
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
                <th>{{ __('messages.name_fr') }}</th>
                <th>{{ __('messages.name_ar') }}</th>
                <th width="180">{{ __('messages.actions') }}</th>
            </tr>

        </thead>

        <tbody>

            @foreach($domaines as $domaine)

                <tr>

                    <td>{{ $domaine->id }}</td>
                    
                    <td>
                      {{ app()->getLocale() == 'ar'
                           ? $domaine->nom_ar
                           : $domaine->nom_fr }}
                    </td>
                    

                    

                    <td>

                        <a href="{{ route('domaines.edit', $domaine->id) }}"
                           class="btn btn-warning btn-sm">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('domaines.destroy', $domaine->id) }}"
                              method="POST"
                              style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('{{ __('messages.confirm_delete_domain') }}')">
                                {{ __('messages.delete') }}
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection