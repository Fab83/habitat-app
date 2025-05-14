@extends('layouts.app')

@section('content')
    <h1>{{ $programme->nom }}</h1>

    <p>{{ $programme->description }}</p>

    <hr>

    <h3>Opérations liées</h3>

    @if ($programme->operations->count() > 0)
        <ul class="list-group">
            @foreach ($programme->operations as $operation)
                <li class="list-group-item">
                    <strong>{{ $operation->nom }}</strong><br>
                    @if($operation->description)
                        <small>{{ $operation->description }}</small><br>
                    @endif
                    <a href="{{ route('operations.edit', $operation) }}" class="btn btn-sm btn-outline-primary mt-2">Modifier</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune opération liée à ce programme.</p>
    @endif

    <a href="{{ route('programmes.index') }}" class="btn btn-secondary mt-4">← Retour à la liste</a>
@endsection
