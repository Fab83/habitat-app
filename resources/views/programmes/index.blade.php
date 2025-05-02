@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex align-items-center mb-3">
        <div>
            <h1 class="m-3">Liste des Programmes</h1>
        </div>
        <div>
            <a href="{{ route('programmes.create') }}" class="btn btn-success btn-sm">Ajout</a>
        </div>
    </div>


    @foreach ($programmes as $programme)
    <div class="card mb-3 p-3">
        <div class="row">
            <div class="col-md-4">
                <!-- <div class="card-body"> -->
                <h4>{{ $programme->nom }}</h4>
                <p>{{ $programme->description }}</p>
                <a href="{{ route('programmes.edit', $programme->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                <form action="{{ route('programmes.destroy', $programme->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Confirmer la suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" title="Supprimer">
                        {{-- <i class="bi bi-trash text-danger"></i> --}}
                        Supprimer
                    </button>
                </form>
            </div>
            <div class="col-md-8 bg-light p-3">
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
</div>
@endforeach
@endsection