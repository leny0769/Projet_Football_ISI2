@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Clubs d'un championnat
@endsection


@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($stats as $s)
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $s->NombreMatch }}</h5>
                </div>
            </div>
        @endforeach
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $joueur->PiedFort }}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection