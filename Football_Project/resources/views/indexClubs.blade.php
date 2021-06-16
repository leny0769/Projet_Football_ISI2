@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Clubs
@endsection

@section('titreItem')
    Voici la liste des clubs
@endsection

@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($clubs as $c)
            <div class="card col-md-auto me-2 mb-2 text-center" style="width: 15rem;">
                <img class="card-img-top" src="{{ $c->LogoURL }} " style="max-width: auto; height: 250px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $c->Nom }}</h5>
                    <p class="card-title">Date de création : {{ $c->DateFondation }}</p>
                    <a class="btn btn-primary" href="{{route('clubs.show',$c->id)}}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection