@extends('layouts.app')
@section('title', 'Modifier un Contact')
@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le Contact</h1>

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

    {{-- Formulaire d'édition --}}
    <form action="{{ route('contacts.update', ['contactECFR' => $contactECFR->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom_contact" class="form-label">Nom</label>
                <input type="text" name="nom_contact" id="nom_contact" class="form-control"
                    value="{{ old('nom_contact', $contactECFR->nom_contact) }}" required>
            </div>
            <div class="col-md-6">
                <label for="prenom_contact" class="form-label">Prénom</label>
                <input type="text" name="prenom_contact" id="prenom_contact" class="form-control"
                    value="{{ old('prenom_contact', $contactECFR->prenom_contact) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="date_contact" class="form-label">Date de Contact</label>
                <input type="date" name="date_contact" id="date_contact" class="form-control"
                    value="{{ old('date_contact', $contactECFR->date_contact) }}" required>
            </div>
            <div class="col-md-6">
                <label for="email_contact" class="form-label">Email</label>
                <input type="email" name="email_contact" id="email_contact" class="form-control"
                    value="{{ old('email_contact', $contactECFR->email_contact) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telephone_contact" class="form-label">Téléphone</label>
                <input type="text" name="telephone_contact" id="telephone_contact" class="form-control"
                    value="{{ old('telephone_contact', $contactECFR->telephone_contact) }}">
            </div>
            <div class="col-md-6">
                <label for="adresse_contact" class="form-label">Adresse</label>
                <input type="text" name="adresse_contact" id="adresse_contact" class="form-control"
                    value="{{ old('adresse_contact', $contactECFR->adresse_contact) }}">
            </div>
        </div>

        <div class="row">
            <div class="col-auto mb-3">
                <label for="commune_contact" class="form-label">Commune</label>
                <select name="commune_contact" id="commune_contact" class="form-select">
                    <option value="" selected disabled>Sélectionner une commune</option>
                    <option value="Les Adrets de l'Esterel"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Les Adrets de l'Esterel" ? 'selected' : '' }}>
                        Les Adrets de l'Esterel</option>
                    <option value="Fréjus"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Fréjus" ? 'selected' : '' }}>Fréjus
                    </option>
                    <option value="Puget-sur-Argens"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Puget-sur-Argens" ? 'selected' : '' }}>
                        Puget-sur-Argens</option>
                    <option value="Roquebrune-sur-Argens"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Roquebrune-sur-Argens" ? 'selected' : '' }}>
                        Roquebrune-sur-Argens</option>
                    <option value="Saint-Raphaël"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Saint-Raphaël" ? 'selected' : '' }}>
                        Saint-Raphaël</option>
                    <option value="DPVA / CCPF"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "DPVA / CCPF" ? 'selected' : '' }}>
                        DPVA / CCPF</option>
                    <option value="Autre ville"
                        {{ old('commune_contact', $contactECFR->commune_contact) == "Autre ville" ? 'selected' : '' }}>
                        Autre ville</option>
                </select>
            </div>
            <div class="col-auto mb-3">
                <label for="code_postal_contact" class="form-label">Code Postal</label>
                <input type="text" name="code_postal_contact" id="code_postal_contact" class="form-control"
                    value="{{ old('code_postal_contact', $contactECFR->code_postal_contact) }}">
            </div>
            <div class="col-auto mb-3">
                <label for="revenu_fiscal" class="form-label">Revenu Fiscal</label>
                <input type="text" name="revenu_fiscal" id="revenu_fiscal" class="form-control"
                    value="{{ old('revenu_fiscal', $contactECFR->revenu_fiscal) }}">
            </div>
            <div class="col-auto mb-3">
                <label for="taille_menage" class="form-label">Taille du Ménage</label>
                <input type="text" name="taille_menage" id="taille_menage" class="form-control"
                    value="{{ old('taille_menage', $contactECFR->taille_menage) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="demande" class="form-label">Demande</label>
                <input type="text" name="demande" id="demande" class="form-control"
                    value="{{ old('demande', $contactECFR->demande) }}">
            </div>
            <div class="col-md-6">
                <label for="reponse" class="form-label">Réponse</label>
                <input type="text" name="reponse" id="reponse" class="form-control"
                    value="{{ old('reponse', $contactECFR->reponse) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="renvoi_citemetrie" class="form-label">Renvoi Citémétrie</label>
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="renvoi_citemetrie" id="renvoi_oui" value="1"
                            {{ old('renvoi_citemetrie', $contactECFR->renvoi_citemetrie) == 1 ? 'checked' : '' }}>
                        <label class="form-check-label" for="renvoi_oui">Oui</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="renvoi_citemetrie" id="renvoi_non" value="0"
                            {{ old('renvoi_citemetrie', $contactECFR->renvoi_citemetrie) == 0 ? 'checked' : '' }}>
                        <label class="form-check-label" for="renvoi_non">Non</label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <label for="commentaires_contact" class="form-label">Commentaires</label>
                <textarea name="commentaires_contact" id="commentaires_contact"
                    class="form-control">{{ old('commentaires_contact', $contactECFR->commentaires_contact) }}</textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="pieces_jointes" class="form-label">Pièces Jointes</label>
                <input type="file" name="pieces_jointes" id="pieces_jointes" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection