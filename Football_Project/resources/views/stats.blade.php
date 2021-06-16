@extends('layouts.layout')

@push('css')
            <link rel="stylesheet" href="">
@endpush

@section('titrePage')
    Clubs d'un championnat
@endsection

@section('titreItem')
    {{ $joueur->Nom }}
@endsection

@section('contenu')
    <div class="container">
    <div class="row text-center mb-3">
    <img class="rounded mx-auto d-block" src="{{ $joueur->PhotoURL }}" style="width:auto;">
    </div>
        <div class="row justify-content-md-center">
        <div class="card col-md-auto me-2 mb-2" style="width: 20rem;">
                <img class="card-img-top" src="" alt="">
                <div class="card-body">
                    <h4 class="card-title text-center">Informations joueur</h4>
                    <p class="card-title">Poste : {{ $joueur->Poste }}</p>
                    <p class="card-title">PiedFort : {{ $joueur->PiedFort }}</p>
                    <p class="card-title">Taille : {{ $joueur->Taille }}</p>
                    <p class="card-title">Poids : {{ $joueur->Poids }}</p>
                    <p class="card-title">DateNaissance : {{ $joueur->DateNaissance }}</p>
                    <p class="card-title">VilleNaissance : {{ $joueur->VilleNaissance }}</p>
                    <p class="card-title">Nationalité : {{ $joueur->Nationalité }}</p>
                    <p class="card-title">TypeJoueur : {{ $joueur->TypeJoueur }}</p>
                </div>
        </div>
        <h3 class="text-center mt-4 border-bottom">Statistiques</h3>
        <table class="table">
            @foreach($stats as $s)
                <tr>
                    <td>Nombre de Titularisation</td>
                    <td>{{$s->NombreTitularisation}}</td>
                </tr>
                <tr>
                    <td>Minutes</td>
                    <td>{{$s->Minutes}}</td>
                </tr>
                <tr>
                    <td>Buts</td>
                    <td>{{$s->Buts}}</td>
                </tr>
                <tr>
                    <td>PassesDécisives</td>
                    <td>{{$s->PassesDécisives}}</td>
                </tr>
                <tr>
                    <td>TirsCadrés</td>
                    <td>{{$s->TirsCadrés}}</td>
                </tr>
                <tr>
                    <td>CartonJaune</td>
                    <td>{{$s->CartonJaune}}</td>
                </tr>
                <tr>
                    <td>CartonRouge</td>
                    <td>{{$s->CartonRouge}}</td>
                </tr>
                <tr>
                    <td>Centres</td>
                    <td>{{$s->Centres}}</td>
                </tr>
                <tr>
                    <td>TaclesReussis</td>
                    <td>{{$s->TaclesReussis}}</td>
                </tr>
                <tr>
                    <td>Interceptions</td>
                    <td>{{$s->Interceptions}}</td>
                </tr>
                <tr>
                    <td>ButCSC</td>
                    <td>{{$s->ButCSC}}</td>
                </tr>
                <tr>
                    <td>Fautes</td>
                    <td>{{$s->Fautes}}</td>
                </tr>
                <tr>
                    <td>HorsJeu</td>
                    <td>{{$s->HorsJeu}}</td>
                </tr>
                <tr>
                    <td>Passes</td>
                    <td>{{$s->Passes}}</td>
                </tr>
                <tr>
                    <td>PassesReussis</td>
                    <td>{{$s->PassesReussis}}</td>
                </tr>
                <tr>
                    <td>TirsBloqués</td>
                    <td>{{$s->TirsBloqués}}</td>
                </tr>
                <tr>
                    <td>Touches</td>
                    <td>{{$s->Touches}}</td>
                </tr>
                <tr>
                    <td>ArretsGardien</td>
                    <td>{{$s->ArretsGardien}}</td>
                </tr>
                <tr>
                    <td>ButsEncaissésGardien</td>
                    <td>{{$s->ButsEncaissésGardien}}</td>
                </tr>
                <tr>
                    <td>CleanSheetsGardien</td>
                    <td>{{$s->CleanSheetsGardien}}</td>
                </tr>
                <tr>
                    <td>PenaltyMarqué</td>
                    <td>{{$s->PenaltyMarqué}}</td>
                </tr>
                <tr>
                    <td>PenaltyManqué</td>
                    <td>{{$s->PenaltyManqué}}</td>
                </tr>
            @endforeach
        </table>
        </div>
    </div>
@endsection