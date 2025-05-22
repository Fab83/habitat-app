@extends('layouts.app')

@section('content')
<div class="container-fluid my-5">
    <h1 class="my-3">Contacts ECFR</h1>

    <a href="{{ route('contacts.create') }}" class="btn btn-info btn-sm mb-3">Ajouter un contact</a>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table id="contactsTable" class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Date contact</th>
                <th>Commune</th>
                <th>Demande</th>
                <th>Réponse</th>
                <th>Renvoi Citémétrie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td><a href="{{ route('contacts.show', $contact) }}">{{ $contact->nom_contact }}</a></td>
                <td>{{ $contact->date_contact }}</td>
                <td>{{ $contact->commune_contact }}</td>
                <td>{{ Str::limit($contact->demande, 100) }}</td>
                <td>{{ Str::limit($contact->reponse, 100) }}</td>
                <td>{{ $contact->renvoi_citemetrie == 0 ? 'Non' : 'Oui' }}</td>
                <td>
                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Supprimer ce contact ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#contactsTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json" // Traduction en français
            },
            order: [
                [0, 'asc']
            ], // Tri par défaut sur la première colonne (Nom)
            pageLength: 10, // Nombre d'éléments par page
        });
    });
</script>
@endpush