@extends('layouts.app')

@section('title', 'Créer une opération')

@section('content')
    <div class="container bg-light p-4 border border-dark-subtle rounded-4">
        <h1 class="mb-4">Ajouter une opération</h1>

        {{-- Affichage des erreurs --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('operations.store') }}" method="POST">
            @csrf
            <div class="row g-2">
                {{-- Nom --}}
                <div class="col-md-4 mb-3">
                    <label for="nom" class="form-label">Nom de l’opération</label>
                    <input type="text" name="nom_operation" id="nom" class="form-control"
                        value="{{ old('nom_operation') }}" required>
                </div>

                {{-- Commune --}}
                <div class="col mb-3">
                    <label for="commune" class="form-label">Commune</label>
                    <select name="commune_operation" id="commune" class="form-select">
                        <option value="">-- Sélectionner une commune --</option>
                        <option value="Les Adrets">Les Adrets</option>
                        <option value="Fréjus">Fréjus</option>
                        <option value="Puget/Argens">Puget/Argens</option>
                        <option value="Roquebrune/Argens">Roquebrune/Argens</option>
                        <option value="Saint-Raphaël">Saint-Raphaël</option>
                        <option value="Autre">Autre</option>
                    </select>
                </div>

                {{-- Bailleur --}}
                <div class="col mb-3">
                    <label for="bailleur_id" class="form-label">Bailleur</label>
                    <select name="bailleur_id" id="bailleur_id" class="form-select" required>
                        <option value="">-- Sélectionner un bailleur --</option>
                        @foreach ($bailleurs as $bailleur)
                            <option value="{{ $bailleur->id }}" {{ old('bailleur_id') == $bailleur->id ? 'selected' : '' }}>
                                {{ $bailleur->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Année prog --}}
                <div class="col mb-3">
                    <label for="année_prog" class="form-label">Année de programmation</label>
                    <input type="text" name="annee_prog" id="année_prog" class="form-control"
                        value="{{ old('annee_prog') }}">
                </div>
            </div>

            <div class="row">
                {{-- Adresse --}}
                <div class="col-md-10 mb-3">
                    <label for="adresse" class="form-label">Adresse opération</label>
                    <input type="text" name="adresse_operation" id="adresse" class="form-control"
                        value="{{ old('adresse_operation') }}" required>
                </div>
                <div class="col-md-2 mt-5 mb-3">
                    <label for=""></label>
                    <a href="#">SIG</a>
                </div>
            </div>
            <hr class="my-3">
            <div class="row g-2">
                {{-- Cadastre --}}
                <div class="col mb-3">
                    <label for="cadastre" class="form-label">Réf. cadastrale</label>
                    <input type="text" class="form-control" name="reference_cadastre" id="cadastre"
                        value="{{ old('reference_cadastre') }}">
                </div>
                {{-- Vefa/MOD --}}
                <div class="col mb-3">
                    <label for="" class="form-label">VEFA/MOD</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="vefa_mod" id="vefa" value="VEFA">
                        <label class="form-check-label" for="vefa">VEFA</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="vefa_mod" id="mod" value="MOD">
                        <label class="form-check-label" for="mod">MOD</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="vefa_mod" id="inconnu"
                            value="VEFA/MOD inconnu" checked>
                        <label class="form-check-label" for="inconnu">Inconnu</label>
                    </div>
                </div>
                {{-- Neuf/AA --}}
                <div class="col mb-3">
                    <label for="" class="form-label">Neuf/acquis-amél.</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="neuf_aa" id="neuf" value="Neuf">
                        <label class="form-check-label" for="neuf">Neuf</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="neuf_aa" id="aa"
                            value="Acquis./Amel.">
                        <label class="form-check-label" for="aa">Acquis./Amél.</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="neuf_aa" id="inconnu"
                            value="neuf-aa inconnu inconnu" checked>
                        <label class="form-check-label" for="inconnu">Inconnu</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 mb-3">
                    <label for="promoteur" class="form-label">Promoteur</label>
                    <input type="text" name="promoteur" id="promoteur" class="form-control" value="{{ old('promoteur') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="numero_pc" class="form-label">N° permis de construire</label>
                    <input type="text" name="numero_pc" id="numero_pc" class="form-control" value="{{ old('numero_pc') }}">
                </div>      
                <div class="col-md-3 mb-3">
                    <label for="date_pc" class="form-label">Date PC</label>
                    <input type="date" name="date_pc" id="date_pc" class="form-control" value="{{ old('date_pc') }}">
                </div>          
                <div class="col-md-3 mb-3">
                    <label for="pc" class="form-label">Fichier PC</label>
                    <input type="file" name="pc" id="pc" class="form-control" value="{{ old('pc') }}">
                </div>                
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="{{ route('operations.index') }}" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
@endsection
