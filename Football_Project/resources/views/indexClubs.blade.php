@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Clubs
@endsection


@section('contenu')
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($clubs as $c)
            <div class="card col-md-auto me-2 mb-2" style="width: 10rem;">
                <img class="card-img-top" src="{{ $c->LogoURL }} " alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $c->Nom }}</h5>
                    <a class="btn btn-primary" href="{{route('clubs.show',$c->id)}}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection