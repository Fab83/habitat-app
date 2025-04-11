@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des opérations</h1>

    <a href="{{ route('operations.create') }}" class="btn btn-info btn-sm m-3">Ajouter une opération</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Année prog.</th>
                <th>Nom opération</th>
                <th>Bailleur</th>
                <th>Commune</th>
                <th>Nombre LLS</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operations as $operation)
            <tr>
                <td>{{ $operation->annee_prog }}</td>
                <td>{{ $operation->nom_operation }}</td>
                <td>{{ $operation->bailleur->nom }}</td>
                <td>{{ $operation->commune_operation }}</td>
                <td></td>

                {{-- Penser à ajouter visibilité fichier PC comme pour convention_cadre bailleur --}}
                <td>
                    <a href="{{ route('operations.show', $operation) }}" class="btn btn-secondary btn-sm">Détails</a>
                    <a href="{{ route('operations.edit', $operation) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('operations.destroy', $operation) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer cette opération ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection