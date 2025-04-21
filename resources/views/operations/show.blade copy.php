@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="display-6 py-3">Opération : {{ $operation->nom_operation }}</h1>
        <table class="table table-bordered table-hover">
            <tr>
                <td>Année programmation</td>
                <td><p class="txtTable">{{ $operation->annee_prog }}</p></td>
                <td>Bailleur</td>
                <td>{{ $operation->bailleur->nom }}</td>
                <td>Commune</td>
                <td>{{ $operation->commune_operation }}</td>

            </tr>
            <tr>                
                <td>Adresse</td>
                <td colspan="3">{{ $operation->adresse_operation }}</td>

                @if($operation->reference_cadastre)
                <td>Cadastre</td>
                <td>{{ $operation->reference_cadastre }}</td>
                @endif
                <td></td>
            </tr>
            <tr>
                <td>VEFA/MOD</td>
                <td>{{ $operation->vefa_mod }}</td>
                <td>Neuf / AA</td>
                <td>{{ $operation->neuf_aa }}</td>
                @if($operation->promoteur)
                <td>Promoteur</td>
                <td>{{ $operation->promoteur }}</td>
                @endif
            </tr>
            <tr>
                <td>Numéro PC</td>
                <td>{{ $operation->numero_pc }}</td>
                <td>Date PC</td>
                <td>{{ $operation->date_pc }}</td>
                <td>PC</td>
                <td>{{ $operation->pc }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">LOCATION - Agréments</h3></td></tr>
            <tr>
                <td>Nombre logements</td>
                <td>{{ $operation->nombre_logements }}</td>
                <td>Nombre LLS</td>
                <td>{{ $operation->nombre_lls }}</td>
                <td>Nombre PLAI Agrément</td>
                <td>{{ $operation->nombre_plai_agrement }}</td>
            </tr>
                <td>Nombre PLUS Agrément</td>
                <td>{{ $operation->nombre_plus_agrement }}</td>
                <td></td>
                <td></td>
            <tr><td colspan="6"><h3 class="text-center">ACCESSION - Agréments</h3></td></tr>
                <td>Nombre PSLA Agrément</td>
                <td>{{ $operation->nombre_psla_agrement }}</td>
                <td>Nombre BRS</td>
                <td>{{ $operation->nombre_brs }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Nombre LLI</td>
                <td>{{ $operation->nombre_lli }}</td>
                <td>Nombre PLUS</td>
                <td>{{ $operation->nombre_plus }}</td>
                <td>Nombre PLAI</td>
                <td>{{ $operation->nombre_plai }}</td>
            </tr>
            <tr>
                <td>Nombre ULS+</td>
                <td>{{ $operation->nombre_ulsplus }}</td>
                <td>Nombre ULS-</td>
                <td>{{ $operation->nombre_ulspls }}</td>
                <td>Nombre PLS</td>
                <td>{{ $operation->nombre_pls }}</td>
            </tr>
            <tr>
                <td>Nombre PLS Agrément</td>
                <td>{{ $operation->nombre_pls_agrement }}</td>
                <td>Nombre PSLA</td>
                <td>{{ $operation->nombre_psla }}</td>
<td></td>
            </tr>
            <tr>
                <td>Nombre ULLI</td>
                <td>{{ $operation->nombre_ulli }}</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Date livraison</td>
                <td>{{ $operation->date_livraison }}</td>
                <td>Nombre logements livrés</td>
                <td>{{ $operation->nombre_logements_livres }}</td>
                <td>RT</td>
                <td>{{ $operation->RT }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">DIVERS</h3></td></tr>
            <tr>
                <td>Inventaire SRU</td>
                <td>{{ $operation->inventaire_sru }}</td>
                <td>SIG</td>
                <td>{{ $operation->sig }}</td>
                <td>Commentaires</td>
                <td>{{ $operation->commentaires }}</td>
            </tr>
            <tr><td colspan="6"><h3 class="text-center">GARANTIES</h3></td></tr>
            <tr>
                <td>Montant GE</td>
                <td>{{ $operation->garantieEmprunt->montant_total }} €</td>
                            <td>Logements réservés (GE)</td>
                <td>{{ $operation->garantieEmprunt->nombre_logements_reserves }}</td>                
                <td>Financement</td>
                <td>{{ $operation->garantieEmprunt->type_financement }}
                    </td>
                </tr>
            <tr>
                <td>Bureau/conseil</td>
                <td>{{ $operation->garantieEmprunt->bureau_conseil }}</td>
                <td>Délibération</td>
                <td>N° {{ $operation->garantieEmprunt->numero_delib }}</td>
                <td>Délibération</td>
                <td><a href="#">Lien Fichier</a></td>
            </tr>
            <tr>
                <td>Montant PLAI Const.</td>
                <td>{{ $operation->garantieEmprunt->montant_plai_construction }} €</td>
                <td>Montant PLAI Foncier</td>
                <td>{{ $operation->garantieEmprunt->montant_plai_foncier }} €</td>
            <td>Montant PLS Const.</td>
            <td>{{ $operation->garantieEmprunt->montant_pls_construction }} €</td>
            </tr>
            <tr>
            <td>Montant PLS Foncier</td>
            <td>{{ $operation->garantieEmprunt->montant_pls_foncier }} €</td>
            <td>Montant PLUS Construction</td>
            <td>{{ $operation->garantieEmprunt->montant_plus_construction }} €</td>
            <td>Montant PLUS Foncier</td>
            <td>{{ $operation->garantieEmprunt->montant_plus_foncier }} €</td>
            </tr>
        </table>

        <hr class="my-3">
        <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-primary btn-sm">Modifier</a>
        <form action="{{ route('operations.destroy', $operation->id) }}" metdod="POST" style="display:inline;">
            @csrf
            {{-- @metdod('DELETE') --}}
            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
        </form>
    @endsection
