@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Pays
@endsection


@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($pays as $p)
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/langfr-225px-Flag_of_Spain.svg.png" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->Nom }}</h5>
                    <a class="btn btn-primary" href="{{ route('pays.show', $p->id) }}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection