@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="row g-4">

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📂</h4>
                <h5>Catégories</h5>

                <a href="{{ route('categories.index') }}"
                   class="btn btn-primary mt-3">
                    Gérer
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📁</h4>
                <h5>Domaines</h5>

                <a href="{{ route('domaines.index') }}"
                   class="btn btn-primary mt-3">
                    Gérer
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body text-center">
                <h4>📜</h4>
                <h5>Textes juridiques</h5>

                <a href="{{ route('textes.index') }}"
                   class="btn btn-primary mt-3">
                    Gérer
                </a>
            </div>
        </div>
    </div>

</div>

@endsection