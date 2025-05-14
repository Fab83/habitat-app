@extends('layouts.app')

@section('content')
    <h1>Données de l'API INSEE</h1>

    @if (!empty($observations))
        <table border="1">
            <thead>
                <tr>
                    <th>Dimension</th>
                    <th>Attribut</th>
                    <th>Valeur</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($observations as $obs)
                    <tr>
                        <td>{{ $obs['dimensions']['some_dimension'] ?? 'N/A' }}</td>
                        <td>{{ $obs['attributes']['some_attribute'] ?? 'N/A' }}</td>
                        <td>{{ $obs['measures']['OBS_VALUE_NIVEAU']['value'] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune donnée disponible.</p>
    @endif
@endsection