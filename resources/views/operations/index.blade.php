@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-3">Liste des opérations</h1>

    <a href="{{ route('operations.create') }}" class="btn btn-info btn-sm m-3">Ajouter une opération</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="operationsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Année prog.</th>
                <th>Annulée</th>
                <th>Nom opération</th>
                <th>Bailleur</th>
                <th>Commune</th>
                <th>Nombre LLS</th>
                <th>Montant GE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operations as $operation)
            <tr class="{{ trim(strtolower($operation->annulation)) === 'oui' ? 'bg-blue text-white' : '' }}">
                <td>{{ $operation->annee_prog }}</td>
                <td>{{ $operation->annulation }}</td>
                <td>
                    <a href="{{ route('operations.show', $operation->id) }}" class="text-decoration-underline">
                        {{ $operation->nom_operation }}
                    </a>
                </td>
                <td>{{ $operation->bailleur->nom }}</td>
                <td>{{ $operation->commune_operation }}</td>
                <td>{{ $operation->nombre_lls }}</td>
                <td>{{ number_format($operation->garantieEmprunt->montant_total, 0, ',', ' ') }} €</td>


                {{-- Penser à ajouter visibilité fichier PC comme pour convention_cadre bailleur --}}
                <td>
                    {{-- <a href="{{ route('operations.show', $operation) }}" class="btn btn-secondary
                    btn-sm">Détails</a> --}}
                    <a href="{{ route('operations.edit', $operation) }}" title="Modifier"><i
                            class="bi bi-pencil-square text-primary"></i></a>
                    <form action="{{ route('operations.destroy', $operation->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" title="Supprimer">
                            <i class="bi bi-trash text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#operationsTable').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });
});
</script>
@endpush