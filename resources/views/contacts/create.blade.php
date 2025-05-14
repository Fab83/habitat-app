@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Ajouter un Contact Réno</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="nom_contact" class="form-label">Nom *</label>
                <input type="text" id="nom_contact" name="nom_contact" class="form-control" value="{{ old('nom_contact') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label for="prenom_contact" class="form-label">Prénom</label>
                <input type="text" id="prenom_contact" name="prenom_contact" class="form-control" value="{{ old('prenom_contact') }}">
            </div>
            <div class="col-md-4 mb-3">
                <label for="date_contact" class="form-label">Date de contact</label>
                <input type="date" id="date_contact" name="date_contact" class="form-control" value="{{ old('date_contact', date('Y-m-d')) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-auto mb-3">
                <label for="email_contact" class="form-label">Email *</label>
                <input type="email" id="email_contact" name="email_contact" class="form-control" value="{{ old('email_contact') }}">
            </div>
            <div class="col-auto mb-3">
                <label for="telephone_contact" class="form-label">Téléphone</label>
                <input type="text" id="telephone_contact" name="telephone_contact" class="form-control" value="{{ old('telephone_contact') }}">
            </div>
            <div class="col-auto mb-3">
                <label for="adresse_contact" class="form-label">Adresse</label>
                <input type="text" id="adresse_contact" name="adresse_contact" class="form-control" value="{{ old('adresse_contact') }}">
            </div>
            <div class="col-auto mb-3">
                <label for="code_postal_contact" class="form-label">Code postal</label>
                <input type="text" id="code_postal_contact" name="code_postal_contact" class="form-control" value="{{ old('code_postal_contact') }}">
            </div>
            <div class="col-auto mb-3">
                <label for="commune_contact" class="form-label">Commune</label>
                <select name="commune_contact" id="commune" class="form-select">
                    <option value="" selected disabled>Sélectionner une commune</option>
                    <option value="Les Adrets de l'Esterel">Les Adrets de l'Esterel</option>
                    <option value="Fréjus">Fréjus</option>
                    <option value="Puget-sur-Argens">Puget-sur-Argens</option>
                    <option value="Roquebrune-sur-Argens">Roquebrune-sur-Argens</option>
                    <option value="Saint-Raphaël">Saint-Raphaël</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="revenu_fiscal" class="form-label">Revenu fiscal</label>
                <input type="text" id="revenu_fiscal" name="revenu_fiscal" class="form-control" value="{{ old('revenu_fiscal') }}" default="Inconnu">
            </div>
            <div class="col mb-3">
                <label for="taille_menage" class="form-label">Taille ménage</label>
                <input type="number" id="taille_menage" name="taille_menage" class="form-control" value="{{ old('taille_menage') }}" default="Inconnu">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="demande" class="form-label">Demande, projet</label>
                <textarea name="demande" id="demande" class="form-control"></textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label for="reponse" class="form-label">Réponse apportée</label>
                <textarea name="reponse" id="reponse" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label for="renvoi_citemetrie" class="form-label">Renvoi Citémétrie</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="renvoi_citemetrie" id="renvoi_oui" value="1">
                        <label class="form-check-label" for="renvoi_oui">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="renvoi_citemetrie" id="renvoi_non" value="0" checked>
                        <label class="form-check-label" for="renvoi_non">Non</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="commentaires_contact" class="form-label">Commentaires</label>
                <textarea name="commentaires_contact" id="commentaires_contact" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <label for="pieces_jointes" class="form-label">Pièces jointes (PDF ou autre fichier)</label>
            <input type="file" name="pieces_jointes" class="form-control">
        </div>
</div>
<button type="submit" class="btn btn-success">Enregistrer</button>
<a href="{{ route('bailleurs.index') }}" class="btn btn-secondary">Annuler</a>
</form>
</div>
@endsection