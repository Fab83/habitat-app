@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Liste des Programmes</h1>
    @foreach ($programmes as $programme)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $programme->nom }}</h4>
                <p>{{ $programme->description }}</p>
                <a href="{{ route('operations.create', ['programme_id' => $programme->id]) }}"
                    class="btn btn-sm btn-outline-success">Ajout opération</a>
                <a href="{{ route('programmes.edit', $programme->id) }}"class="btn btn-sm btn-outline-warning">Modifier
                    programme</a>
                <form action="{{ route('programmes.destroy', $programme->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm" title="Supprimer">
                        {{-- <i class="bi bi-trash text-danger"></i> --}}
                        Supprimer
                    </button>
                </form>
                <hr>
                <h6 class="text-danger">Opérations associées :</h6>
                @if ($programme->operations->isEmpty())
                    <p><em>Aucune opération liée.</em></p>
                @else
                    <ul class="list-group">
                        @foreach ($programme->operations as $operation)
                            <li class="list-group-item">
                                {{ $operation->nom_operation }}
                                <a href="{{ route('operations.edit', $operation) }}"
                                    class="btn btn-sm btn-outline-primary float-end">Modifier</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    @endforeach
    <div class="col align-self-center">
        <a href="{{ route('programmes.create') }}" class="btn btn-success btn-sm">Créer programme</a>
    </div>
</div>
@endsection
