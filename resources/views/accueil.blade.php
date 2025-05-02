@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="text-center">
        <h1 class="display-5 mb-5">HABITAT ECAA</h1>
        <div class="d-flex flex-row justify-content-center">
            <div class="d-flex flex-column align-items-center">
                <a href="{{ url('/programmes') }}" class="btn btn-primary mb-3 me-3" style="width: 135px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <span class="text-white">PROGRAMMES</span>
                </a>
                <a href="{{ url('/operations') }}" class="btn btn-outline-primary mb-3 me-3" style="width:135px;display: flex; justify-content: center; align-items: center;">
                    <span>Opérations</span>
                </a>
            </div>
            <a href="{{ url('/bailleurs') }}" class="btn btn-light mb-3 me-3" style="width: 135px; height: 60px; display: flex; justify-content: center; align-items: center;">
                <span class="text-body">BAILLEURS</span>
            </a>
            <div class="d-flex flex-column align-items-center">
                <a href="#" class="btn btn-success mb-3 me-3" style="width: 135px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <span class="text-white">LOGEMENTS</span></a>
                <a href="#" class="btn btn-outline-success mb-3 me-3" style="width: 135px; display: flex; justify-content: center; align-items: center;">
                    <span>Demandes (SNE)</span>
                </a>
                <a href="#" class="btn btn-outline-success mb-3 me-3" style="width: 135px; display: flex; justify-content: center; align-items: center;">
                    <span>Attributions</span>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center">
                <a href="{{ url('/contacts') }}" class="btn btn-danger mb-3 me-3" style="width: 135px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <span class="text-white">RENOVATION</span></a>
                <a href="#" class="btn btn-outline-danger mb-3 me-3" style="width: 135px; display: flex; justify-content: center; align-items: center;">
                    <span>--Todo--</span>
                </a>
            </div>
            <div class="d-flex flex-column align-items-center">
                <a href="#" class="btn btn-warning mb-3 me-3" style="width: 135px; height: 60px; display: flex; justify-content: center; align-items: center;">
                    <span>TERRITOIRE</span> </a>
                <a href="#" class="btn btn-outline-warning me-3" style="width: 135px; display: flex; justify-content: center; align-items: center;">
                    <span>Données générales</span>
                    <a href="#" class="btn btn-outline-warning mb-3 me-3" style="width: 135px; display: flex; justify-content: center; align-items: center;">
                        <span>Foncier (DV3F)</span>
                    </a>
            </div>
        </div>
    </div>
</div>
@endsection