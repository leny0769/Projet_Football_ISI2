@extends('layouts.layout')

@section('contenu')
<br>
<div class="container">
    <div class="row card text-white bg-dark">
        @auth
            <h4 class="card-header">Ajouter un Joueur</h4>
            <div class="card-body">
                <form action="{{ route('joueurs.store')}}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Prénom') is-invalid @enderror"
                            name="Prénom" id="Prénom" placeholder="Prénom">
                        @error('Prénom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Nom') is-invalid @enderror"
                            name="Nom" id="Nom" placeholder="Nom">
                        @error('Nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Poste') is-invalid @enderror" name="Poste" id="Poste"
                            placeholder="Poste (A/M/D/G)">
                        @error('Poste')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('PiedFort') is-invalid @enderror" name="PiedFort" id="PiedFort"
                            placeholder="Pied Fort (D/G)">
                        @error('prix')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Taille') is-invalid @enderror" name="Taille" id="Taille"
                            placeholder="Taille">
                        @error('Taille')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Poids') is-invalid @enderror" name="Poids" id="Poids"
                            placeholder="Poids">
                        @error('Poids')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="date" class="form-control @error('DateNaissance') is-invalid @enderror" name="DateNaissance" id="DateNaissance"
                            placeholder="Date de naissance">
                        @error('DateNaissance')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('VilleNaissance') is-invalid @enderror" name="VilleNaissance" id="VilleNaissance"
                            placeholder="Ville de naissance">
                        @error('VilleNaissance')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Nationalité') is-invalid @enderror" name="Nationalité" id="Nationalité"
                            placeholder="Nationalité">
                        @error('Nationalité')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="url" class="form-control @error('PhotoURL') is-invalid @enderror" name="PhotoURL" id="PhotoURL"
                            placeholder="PhotoURL">
                        @error('PhotoURL')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('TypeJoueur') is-invalid @enderror" name="TypeJoueur" id="TypeJoueur"
                            placeholder="Type de Joueur (A/R)">
                        @error('TypeJoueur')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Numéro') is-invalid @enderror" name="Numéro" id="Numéro"
                            placeholder="Numéro">
                        @error('Numéro')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('club_id') is-invalid @enderror" name="club_id" id="club_id"
                            placeholder="ID du club">
                        @error('club_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary">Envoyer !</button>
                </form>
            </div>
        @else
            <h4 class="card-header">Accès interdit</h4>
            <div class="card-body">
                <p>Veuillez vous connecter pour acceder à cette page</p>
            </div>
        @endauth
    </div>
</div>
@endsection