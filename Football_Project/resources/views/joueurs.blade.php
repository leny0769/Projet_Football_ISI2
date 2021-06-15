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
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $j->Nom }}</h5>
                    <a class="btn btn-primary" href="{{route('joueurs.show',$j->id)}}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection