@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1>Détails du Contact</h1>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Commune</th>
                <th>Année</th>
                <th>Mois</th>
                <th>Nombre de contacts</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($stats as $ligne)
            <tr>
                <td>{{ $ligne->commune_contact }}</td>
                <td>{{ $ligne->annee }}</td>
                <td>{{ ucfirst($ligne->mois_libelle) }}</td>
                <td>{{ $ligne->total }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Aucune donnée disponible</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Retour à la liste</a>
</div>
@endsection