@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Parcelles communales à SAINT-RAPHAËL (2021)</h1>

    <form method="GET" action="{{ url()->current() }}" class="mb-4">
        <label for="com_arm_name">Choisissez une commune :</label>
        <select name="com_arm_name" id="com_arm_name" onchange="this.form.submit()">
            @foreach ($comArmNames as $name)
            <option value="{{ $name }}" {{ $name === $selectedComArmName ? 'selected' : '' }}>
                {{ $name }}
            </option>
            @endforeach
        </select>
    </form>

    {{-- Affichage des résultats --}}
    @if (!empty($records))
    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Voie</th>
                <th>Propriétaire</th>
                <th>Nature</th>
                <th>Surface</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <td>{{ $record['code_voie_rivoli_parcelle'].' '.$record['nature_voie_parcelle'].' '.$record['nom_voie_parcelle'] ?? 'N/A' }}</td>
            <td>{{ $record['denomination_proprietaire'] ?? 'N/A' }}</td>
            <td>{{ $record['nature_culture'] ?? 'N/A' }}</td>
            <td>{{ $record['contenance_suf'] ?? 'N/A' }}</td>
            </tr> @endforeach
            </ul>
            @else
            <p>Aucun résultat trouvé.</p>
            @endif
        </tbody>
    </table>
</div>
@endsection