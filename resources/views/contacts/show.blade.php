@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Détails du Contact</h1>

    <table class="table table-bordered">
        <tbody>
            @if (!empty($contactECFR->nom_contact))
            <tr>
                <th>Nom</th>
                <td>{{ $contactECFR->nom_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->prenom_contact))
            <tr>
                <th>Prénom</th>
                <td>{{ $contactECFR->prenom_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->date_contact))
            <tr>
                <th>Date de Contact</th>
                <td>{{ $contactECFR->date_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->email_contact))
            <tr>
                <th>Email</th>
                <td>{{ $contactECFR->email_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->telephone_contact))
            <tr>
                <th>Téléphone</th>
                <td>{{ $contactECFR->telephone_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->adresse_contact))
            <tr>
                <th>Adresse</th>
                <td>{{ $contactECFR->adresse_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->commune_contact))
            <tr>
                <th>Commune</th>
                <td>{{ $contactECFR->commune_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->code_postal_contact))
            <tr>
                <th>Code Postal</th>
                <td>{{ $contactECFR->code_postal_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->revenu_fiscal))
            <tr>
                <th>Revenu Fiscal</th>
                <td>{{ $contactECFR->revenu_fiscal }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->taille_menage))
            <tr>
                <th>Taille du Ménage</th>
                <td>{{ $contactECFR->taille_menage }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->demande))
            <tr>
                <th>Demande</th>
                <td>{{ $contactECFR->demande }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->reponse))
            <tr>
                <th>Réponse</th>
                <td>{{ $contactECFR->reponse }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->commentaires_contact))
            <tr>
                <th>Commentaires</th>
                <td>{{ $contactECFR->commentaires_contact }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->renvoi_citemetrie))
            <tr>
                <th>Renvoi Citémétrie</th>
                <td>{{ $contactECFR->renvoi_citemetrie ? 'Oui' : 'Non' }}</td>
            </tr>
            @endif

            @if (!empty($contactECFR->pieces_jointes))
            <tr>
                <th>Pièces Jointes</th>
                <td><a href="{{ asset('storage/' . $contactECFR->pieces_jointes) }}" target="_blank">Télécharger</a></td>
            </tr>
            @endif
        </tbody>
    </table>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection