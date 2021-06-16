@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Pays
@endsection

@section('contenu')
    <header class="fs-1 text-center fw-bold">Voici les différents pays</header>
    <p class="text-center mb-5 border-bottom">(Cliquer sur un pays pour découvrir ses championnats)</p>
    <div class="container">
        <div class="row justify-content-md-center">
        @foreach($pays as $p)
            <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="{{ $p->URLDrapeau }}" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $p->Nom }}</h5>
                    <a class="btn btn-primary" href="{{route('pay.show',$p->id)}}">Voir</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection