@extends('layouts.app')

@section('content')
    <h1>Liste des Programmes</h1>

    @foreach ($programmes as $programme)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $programme->nom }}</h4>
                <p>{{ $programme->description }}</p>
                <a href="{{ route('programmes.edit', $programme->id) }}"class="btn btn-sm btn-warning">Modifier</a>
                <a href="{{ route('programmes.destroy', $programme->id) }}"class="btn btn-sm btn-danger">Supprimer</a>
<hr>
                <h6>Opérations associées :</h6>
                @if ($programme->operations->isEmpty())
                    <p><em>Aucune opération liée.</em></p>
                @else
                    <ul class="list-group">
                        @foreach ($programme->operations as $operation)
                            <li class="list-group-item">
                                {{ $operation->nom_operation }}
                                <a href="{{ route('operations.edit', $operation) }}" class="btn btn-sm btn-outline-primary float-end">Modifier</a>
                            </li>
                            @endforeach
                            <a href="{{ route('operations.create', ['programme_id' => $programme->id]) }}" class="btn btn-sm btn-success mt-2">
                                Ajouter une opération à ce programme
                            </a>
                    </ul>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('programmes.create') }}" class="btn btn-success btn-sm">Créer</a>
@endsection
