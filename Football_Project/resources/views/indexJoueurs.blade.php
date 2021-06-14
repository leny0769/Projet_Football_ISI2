@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Joueurs
@endsection


@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($joueurs as $j)
            <div class="card col-md-auto me-2 mb-2" style="width: 10rem;">
                <img class="card-img-top" src="{{ $j->PhotoURL }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $j->Nom }} {{ $j->Prénom }}</h5>
                    <a class="btn btn-primary" href="">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection