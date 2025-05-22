@extends('layouts.app')
@section('title', 'Accueil')

@section('content')
<div class="container-fluid d-flex-column justify-content-center align-items-center" style="height: 100vh;">
    <div class="row">
        <h1 class="display-5 my-5 text-center">HABITAT ECAA</h1>
    </div>

    <div class="row w-100 justify-content-center">

        <!-- Colonne 1 : Programmes et Opérations -->
        <div class="col-12 col-md-2 mb-5 d-flex flex-column align-items-center">
            <a href="{{ url('/programmes') }}" class="btn btn-primary w-100 mb-3">
                PROGRAMMES
            </a>
            <a href="{{ url('/operations') }}" class="btn btn-outline-primary w-100 mb-3">
                Opérations
            </a>
        </div>

        <!-- Colonne 2 : Bailleurs -->
        <div class="col-12 col-md-2 mb-5 d-flex flex-column align-items-center">
            <a href="{{ url('/bailleurs') }}" class="btn btn-secondary w-100 mb-3">
                BAILLEURS
            </a>
            <a href="{{ url('/#') }}" class="btn btn-outline-secondary w-100 mb-3">
                Parc privé ?
            </a>
        </div>

        <!-- Colonne 3 : Logements -->
        <div class="col-12 col-md-2 mb-5 d-flex flex-column align-items-center">
            <a href="{{ url('#') }}" class="btn btn-success w-100 mb-3">LOGEMENTS</a>
            <a href="{{ url('#') }}" class="btn btn-outline-success w-100 mb-3">Demandes</a>
            <a href="{{ url('#') }}" class="btn btn-outline-success w-100 mb-3">Attributions</a>
        </div>

        <!-- Colonne 4 : Rénovation -->
        <div class="col-12 col-md-2 mb-5 d-flex flex-column align-items-center">
            <a href="{{ url('/contacts') }}" class="btn btn-danger w-100 mb-3">RENOVATION</a>
            <a href="{{ url('#') }}" class="btn btn-outline-danger w-100 mb-3">PIG</a>
            <a href="{{ url('#') }}" class="btn btn-outline-danger w-100 mb-3">POPAC</a>
        </div>

        <!-- Colonne 5 : Territoire -->
        <div class="col-12 col-md-2 mb-5 d-flex flex-column align-items-center">
            <a href="{{ url('/contacts') }}" class="btn btn-warning w-100 mb-3">TERRITOIRE</a>
            <a href="{{ url('#') }}" class="btn btn-outline-warning w-100 mb-3">Données générales</a>
            <a href="{{ url('#') }}" class="btn btn-outline-warning w-100 mb-3">Foncier</a>
        </div>
    </div>
</div>
@endsection