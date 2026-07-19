@extends('layouts.visitor')

@section('title','Lois')

@section('content')

<div class="container py-5">

    <h2 class="mb-4 fw-bold text-primary">
        Domaines des lois
    </h2>

    <div class="row">

        @foreach($domaines as $domaine)

            <div class="col-md-4 mb-4">

                <a href="#"
                   class="text-decoration-none">

                    <div class="card shadow-sm h-100">

                        <div class="card-body text-center">

                            <h5 class="fw-semibold">
                                {{ $domaine->nom_domaine }}
                            </h5>

                        </div>

                    </div>

                </a>

            </div>

        @endforeach

    </div>

</div>

@endsection