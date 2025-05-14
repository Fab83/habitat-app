@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-3">Liste des bailleurs</h1>

    <a href="{{ route('bailleurs.create') }}" class="btn btn-info btn-sm m-3">Ajouter un bailleur</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Commune</th>
                <th>Convention cadre</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bailleurs as $bailleur)
            <tr>
                <td>{{ $bailleur->nom }}</td>
                <td>{{ $bailleur->commune_bailleur }}</td>
                <td>
                    @if ($bailleur->convention_cadre)
                    <a href="{{ asset('storage/' . $bailleur->convention_cadre) }}" target="_blank"
                        onclick="window.open(this.href, 'popup', 'width=800,height=600'); return false;">
                        {{ $bailleur->nom_fichier_original ?? 'Voir le fichier' }}
                    </a>
                    @else
                    <em>Aucun fichier</em>
                    @endif
                </td>
                <td>

                    <a href="{{ route('bailleurs.edit', $bailleur) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('bailleurs.destroy', $bailleur) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce bailleur ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection