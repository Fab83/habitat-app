@extends('layouts.app')
@section('title', 'Modifier un bailleur')
@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le bailleur</h1>

    {{-- Affichage des erreurs de validation --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('bailleurs.update', $bailleur->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nom --}}
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du bailleur</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $bailleur->nom) }}"
                required>
        </div>

        {{-- Commune --}}
        <div class="mb-3">
            <label for="commune_bailleur" class="form-label">Commune</label>
            <input type="text" name="commune_bailleur" id="commune_bailleur" class="form-control"
                value="{{ old('commune_bailleur', $bailleur->commune_bailleur) }}" required>
        </div>

        {{-- Convention cadre (visualisation du fichier actuel si présent) --}}
        <div class="mb-3">
            <label for="convention_cadre" class="form-label">Convention cadre (fichier)</label>
            @if ($bailleur->convention_cadre)
            <p>
                Fichier actuel :
                <a href="{{ asset('storage/' . $bailleur->convention_cadre) }}" target="_blank">
                    Voir le fichier
                </a>
            </p>
            @endif
            <input type="file" name="convention_cadre" id="convention_cadre" class="form-control">
        </div>

        {{-- Bouton de soumission --}}
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('bailleurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection