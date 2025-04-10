@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Parcelles communales à SAINT-RAPHAËL (2021)</h1>

    @if(count($records) > 0)
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Commune</th>
                    <th>Voie</th>
                    <th>Propriétaire</th>
                    <th>Nature</th>
                    <th>Surface</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    <tr>
                        <td>{{ $record['com_arm_name'] ?? 'N/A' }}</td>
                        <td>{{ $record['code_voie_rivoli_parcelle'].' '.$record['nature_voie_parcelle'].' '.$record['nom_voie_parcelle'] ?? 'N/A' }}</td>
                        <td>{{ $record['denomination_proprietaire'] ?? 'N/A' }}</td>
                        <td>{{ $record['nature_culture'] ?? 'N/A' }}</td>
                        <td>{{ $record['contenance_suf'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune parcelle trouvée pour les critères spécifiés.</p>
    @endif
</div>
@endsection
