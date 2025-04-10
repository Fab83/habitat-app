@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un bailleur</h1>

    <form action="{{ route('bailleurs.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nom" class="form-label">Nom *</label>
                <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="commune_bailleur" class="form-label">Commune</label>
                <input type="text" name="commune_bailleur" class="form-control" value="{{ old('commune_bailleur') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="convention_cadre" class="form-label">Convention cadre (PDF ou autre fichier)</label>
                <input type="file" name="convention_cadre" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <a href="{{ route('bailleurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection