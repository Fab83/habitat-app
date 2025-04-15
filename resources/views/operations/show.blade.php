@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-6 py-3">Opération : {{ $operation->nom_operation }}</h1>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Année programmation</th>
                <td>{{ $operation->annee_prog }}</td>
                <th>Bailleur</th>
                <td>{{ $operation->bailleur->nom }}</td>
                <th>Commune</th>
                <td>{{ $operation->commune_operation }}</td>

            </tr>
            <tr>                
                <th>Adresse</th>
                <td colspan="3">{{ $operation->adresse_operation }}</td>
                <th>Cadastre</th>
                <td>{{ $operation->reference_cadastre }}</td>
            </tr>
            <tr>
                <th>VEFA/MOD</th>
                <td>{{ $operation->vefa_mod }}</td>
                <th>Neuf / AA</th>
                <td>{{ $operation->neuf_aa }}</td>
                <th>Promoteur</th>
                <td>{{ $operation->promoteur }}</td>
            </tr>
            <tr>
                <th>Numéro PC</th>
                <td>{{ $operation->numero_pc }}</td>
                <th>Date PC</th>
                <td>{{ $operation->date_pc }}</td>
                <th>PC</th>
                <td>{{ $operation->pc }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">LOGEMENTS</h3></td></tr>
            <tr>
                <th>Nombre logements</th>
                <td>{{ $operation->nombre_logements }}</td>
                <th>Nombre LLS</th>
                <td>{{ $operation->nombre_lls }}</td>
                <th>Nombre PLAI</th>
                <td>{{ $operation->nombre_plai }}</td>
            </tr>
            <tr>
                <th>Nombre PLAI Agrément</th>
                <td>{{ $operation->nombre_plai_agrement }}</td>

                <th>Nombre PLUS</th>
                <td>{{ $operation->nombre_plus }}</td>

                <th>Nombre PLUS Agrément</th>
                <td>{{ $operation->nombre_plus_agrement }}</td>
            </tr>
            <tr>
                <th>Nombre ULS+</th>
                <td>{{ $operation->nombre_ulsplus }}</td>
                <th>Nombre ULS-</th>
                <td>{{ $operation->nombre_ulspls }}</td>
                <th>Nombre PLS</th>
                <td>{{ $operation->nombre_pls }}</td>
            </tr>
            <tr>
                <th>Nombre PLS Agrément</th>
                <td>{{ $operation->nombre_pls_agrement }}</td>
                <th>Nombre PSLA</th>
                <td>{{ $operation->nombre_psla }}</td>
                <th>Nombre PSLA Agrément</th>
                <td>{{ $operation->nombre_psla_agrement }}</td>
            </tr>
            <tr>
                <th>Nombre BRS</th>
                <td>{{ $operation->nombre_brs }}</td>
                <th>Nombre LLI</th>
                <td>{{ $operation->nombre_lli }}</td>
                <th>Nombre ULLI</th>
                <td>{{ $operation->nombre_ulli }}</td>
            </tr>
            <tr>
                <th>Date livraison</th>
                <td>{{ $operation->date_livraison }}</td>
                <th>Nombre logements livrés</th>
                <td>{{ $operation->nombre_logements_livres }}</td>
                <th>RT</th>
                <td>{{ $operation->RT }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">DIVERS</h3></td></tr>
            <tr>
                <th>Inventaire SRU</th>
                <td>{{ $operation->inventaire_sru }}</td>
                <th>SIG</th>
                <td>{{ $operation->sig }}</td>
                <th>Commentaires</th>
                <td>{{ $operation->commentaires }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">GARANTIES</h3></td></tr>

            <tr>
                <th>Montant GE</th>
                <td>{{ $operation->garantieEmprunt->montant_total }} €</td>
                            <th>Logements réservés (GE)</th>
                <td>{{ $operation->garantieEmprunt->nombre_logements_reserves }}</td>                
                <th>Financement</th>
                <td>{{ $operation->garantieEmprunt->type_financement }}
                    </td>
                </tr>
            <tr>
                <th>Bureau/conseil</th>
                <td>{{ $operation->garantieEmprunt->bureau_conseil }}</td>
                <th>Délibération</th>
                <td>N° {{ $operation->garantieEmprunt->numero_delib }}</td>
                <th>Délibération</th>
                <td><a href="#">Lien Fichier</a></td>
            </tr>
            <tr>
                <th>Montant PLAI Const.</th>
                <td>{{ $operation->garantieEmprunt->montant_plai_construction }} €</td>
                <th>Montant PLAI Foncier</th>
                <td>{{ $operation->garantieEmprunt->montant_plai_foncier }} €</td>
            <th>Montant PLS Const.</th>
            <td>{{ $operation->garantieEmprunt->montant_pls_construction }} €</td>
            </tr>
            <tr>
            <th>Montant PLS Foncier</th>
            <td>{{ $operation->garantieEmprunt->montant_pls_foncier }} €</td>
            <th>Montant PLUS Construction</th>
            <td>{{ $operation->garantieEmprunt->montant_plus_construction }} €</td>
            <th>Montant PLUS Foncier</th>
            <td>{{ $operation->garantieEmprunt->montant_plus_foncier }} €</td>
            </tr>
        </table>

        <hr class="my-3">
        <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-primary btn-sm">Modifier</a>
        <form action="{{ route('operations.destroy', $operation->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
        </form>
    @endsection
