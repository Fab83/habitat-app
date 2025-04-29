@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Valeur foncière</h1>

    <form method="GET" action="{{ url()->current() }}" class="mb-4">
        <label for="com_name">Choisissez une commune :</label>
        <select name="com_name" id="com_name" onchange="this.form.submit()">
            @foreach ($selectedComDVFName as $name)
            <option value="{{ $name }}" {{ $name === $selectedComDVFName ? 'selected' : '' }}>
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
                <th>Nature</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($records as $record)
            <td>{{ $record['nature_mutation'] ?? 'N/A' }}</td>
            </tr> @endforeach
            </ul>
            @else
            <p>Aucun résultat trouvé.</p>
            @endif
        </tbody>
    </table>
</div>
@endsection