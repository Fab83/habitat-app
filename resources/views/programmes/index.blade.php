@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <h1 class="my-5">Liste des Programmes immobiliers avec LLS</h1>
        <a href="{{ route('programmes.create') }}" class="btn btn-success btn-sm ms-auto">Ajout</a>
    </div>

    @foreach ($programmes as $programme)
    <div class="card mb-3">
        <div class="row g-0">
            <!-- Colonne Programme -->
            <div class="col-md-4 p-3 border-end">
                <h4 class="fw-bold">{{ $programme->nom }}</h4>
                <p>{{ $programme->description }}</p>

                <div class="d-flex gap-2">
                    <a href="{{ route('programmes.edit', $programme->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                    <form action="{{ route('programmes.destroy', $programme->id) }}" method="POST"
                        onsubmit="return confirm('Confirmer la suppression ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </div>
            </div>

            <!-- Colonne Opérations -->
            <div class="col-md-8 p-3 bg-light">
                <h6 class="text-danger">Opérations associées :</h6>
                <a href="{{ route('operations.create', ['programme_id' => $programme->id]) }}"
                    class="btn btn-sm btn-success mb-3">Ajout opération</a>

                @if ($programme->operations->isEmpty())
                <p><em>Aucune opération liée.</em></p>
                @else
                <ul class="list-group">
                    @foreach ($programme->operations as $operation)
                    <li class="list-group-item">
                        {{ $operation->nom_operation }}
                        <a href="{{ route('operations.edit', $operation) }}"
                            class="btn btn-sm btn-primary float-end">Modifier</a>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection