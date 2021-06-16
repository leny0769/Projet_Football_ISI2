@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Joueurs
@endsection

@section('titreItem')
    Voici la liste de tous les joueurs
@endsection

@section('contenu')
    <div class="text-center p-5 mb-5 border border-3">
        @auth
        <a class="btn btn-success" href="{{ route('joueurs.create') }}">Ajouter nouveau joueur</a>
        @endauth
    </div>
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($joueurs as $j)
            <div class="card col-md-auto me-2 mb-2" style="width: 10rem;">
                <img class="card-img-top" src="{{ $j->PhotoURL }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $j->Nom }} {{ $j->Prénom }}</h5>
                    <a class="btn btn-primary" href="{{route('joueurs.show',$j->id)}}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection