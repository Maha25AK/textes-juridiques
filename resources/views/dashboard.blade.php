@extends('layouts.admin')

@section('title', __('messages.dashboard'))

@section('content')

<div class="row g-4">

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📂</h4>
                <h5>{{ __('messages.categories') }}</h5>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-primary mt-3">
                    {{ __('messages.manage') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📁</h4>
                <h5>{{ __('messages.domaines') }}</h5>

                <a href="{{ route('domaines.index') }}"
                   class="btn btn-primary mt-3">
                    {{ __('messages.manage') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📜</h4>
                <h5>{{ __('messages.legal_texts') }}</h5>

                <a href="{{ route('textes.index') }}"
                   class="btn btn-primary mt-3">
                    {{ __('messages.manage') }}
                </a>
            </div>
        </div>
    </div>

</div>

@endsection 