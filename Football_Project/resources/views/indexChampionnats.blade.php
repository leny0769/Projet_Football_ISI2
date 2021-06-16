@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Championnats
@endsection

@section('titreItem')
    Voici la liste des championnats
@endsection

@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($championnats as $c)
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $c->Nom }}</h5>
                    <p class="card-text">{{ $c->Format }}</p>
                    <a class="btn btn-primary" href="">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection