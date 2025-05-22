@extends('layouts.app')
<style>
    body {
        line-height: 1;
        ;
    }
</style>
@section('content')
<div class="container my-5">
    <h1 class="display-6">Opération : {{ $operation->nom_operation }}</h1>
    <p class="fs-6 fst-italic">N'apparaissent que les données non vides</p>
    <table class="table">
        <tr>
            <th>Année programmation</th>
            <td>{{ $operation->annee_prog }}</td>
            <th>Etat d'avancement</th>
            <td>{{ $operation->etat_avancement }}</td>
        </tr>
        <tr>
            <th>Bailleur</th>
            <td>{{ $operation->bailleur->nom }}</td>
        </tr>
        <tr>
            <th>Adresse</th>
            <td id="adresse" colspan="3">{{ $operation->adresse_operation }}
                <a href="#" id="osmLink" target="_blank" class="disabled osmLinked">Carte</a>
            </td>
        </tr>
        <tr>
            <th>Commune</th>
            <td id="commune">{{ $operation->commune_operation }}</td>
        </tr>

        @if ($operation->reference_cadastre)

        <th>Cadastre</th>
        <td>{{ $operation->reference_cadastre }}</td>
        @endif @if ($operation->vefa_mod)
        <tr>
            <th>VEFA/MOD</th>
            <td>{{ $operation->vefa_mod }}</td>

            @endif
            @if ($operation->neuf_aa)
            <th>Neuf / AA</th>
            <td>{{ $operation->neuf_aa }}</td>
        </tr>
        @endif
        @if ($operation->promoteur)
        <tr>
            <th>Promoteur</th>
            <td>{{ $operation->promoteur }}</td>
        </tr>
        @endif
        @if ($operation->numero_pc)
        <tr>
            <th>Numéro PC</th>
            <td>{{ $operation->numero_pc }}</td>
        </tr>
        @endif
        @if ($operation->date_pc)
        <tr>
            <th>Date PC</th>
            <td>{{ $operation->date_pc }}</td>
        </tr>
        @endif
        @if ($operation->pc)
        <tr>
            <th>PC</th>
            <td>{{ $operation->pc }}</td>
        </tr>
        @endif

        <tr>
            <td>
                <h4 class="text-danger">LOCATION</h4>
            </td>
        </tr>

        <tr>
            @if ($operation->nombre_logements)
            <th>Nombre logements</th>
            <td>{{ $operation->nombre_logements }}</td>

            @endif

            @if ($operation->nombre_lls)
            <th>Nombre LLS</th>
            <td>{{ $operation->nombre_lls }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plai_agrement)
        <tr>
            <th>Nombre PLAI Agrément</th>
            <td>{{ $operation->nombre_plai_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plai)
        <tr>
            <th>Nombre PLAI</th>
            <td>{{ $operation->nombre_plai }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plus_agrement)
        <tr>
            <th>Nombre PLUS Agrément</th>
            <td>{{ $operation->nombre_plus_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plus)
        <th>Nombre PLUS</tthd>
        <td>{{ $operation->nombre_plus }}</td>
        <tr>
            @endif
            @if ($operation->nombre_pls_agrement)
        <tr>
            <th>Nombre PLS Agrément</th>
            <td>{{ $operation->nombre_pls_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_pls)
        <th>Nombre PLS</th>
        <td>{{ $operation->nombre_pls }}</td>
        </tr>
        @endif

        @if ($operation->nombre_ulsplus)
        <tr>
            <th>Nombre ULS+</th>
            <td>{{ $operation->nombre_ulsplus }}</td>
        </tr>
        @endif

        @if ($operation->nombre_ulspls)
        <tr>
            <th>Nombre ULS-</th>
            <td>{{ $operation->nombre_ulspls }}</td>
        </tr>
        @endif
        <tr>
            <td>
                <h4 class="text-danger">Intermédiaire</h4>
            </td>
        </tr>
        @if ($operation->nombre_lli)
        <tr>
            <th>Nombre LLI</th>
            <td>{{ $operation->nombre_lli }}</td>
        </tr>
        @endif
        @if ($operation->nombre_ulli)
        <tr>
            <th>Nombre ULLI</th>
            <td>{{ $operation->nombre_ulli }}</td>
        </tr>
        @endif

        <td>
            <h4 class="text-danger">ACCESSION</h4>
        </td>
        </tr>
        @if ($operation->nombre_psla_agrement)
        <tr>
            <th>Nombre PSLA Agrément</th>
            <td>{{ $operation->nombre_psla_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_psla)
        <tr>
            <th>Nombre PSLA</th>
            <td>{{ $operation->nombre_psla }}</td>
        </tr>
        @endif
        @if ($operation->nombre_brs)
        <tr>
            <th>Nombre BRS Agrément</th>
            <td>{{ $operation->nombre_brs }}</td>
        </tr>
        @endif
        <td>
            <h4 class="text-danger">LIVRAISON</h4>
        </td>
        @if($operation->date_livraison)
        <tr>
            <th>Date livraison</th>
            <td>{{ $operation->date_livraison }}</td>
        </tr>
        @endif
        @if($operation->nombre_logements_livres)
        <tr>
            <th>Nombre logements livrés</th>
            <td>{{ $operation->nombre_logements_livres }}</td>
        </tr>
        @endif
        @if($operation->rt)
        <tr>
            <th>RT</th>
            <td>{{ $operation->RT }}</td>
        </tr>
        @endif
        <tr>
            <td colspan="6">
                <h4 class="text-danger">Autres informations</h4>
            </td>
        </tr>
        @if($operation->inventaire_sru)
        <tr>
            <th>Inventaire SRU</th>
            <td>{{ $operation->inventaire_sru }}</td>
        </tr>
        @endif
        @if($operation->sig)
        <tr>
            <th>SIG</th>
            <td>{{ $operation->sig }}</td>
        </tr>
        @endif
        @if($operation->commentaires)
        <tr>
            <th>Commentaires</th>
            <td>{{ $operation->commentaires }}</td>
        </tr>
        @endif
        <tr>
            <td colspan="6">
                <h4 class="text-danger">Garanties d'emprunt</h4>
            </td>
        </tr>
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_total)
        <tr>
            <th>Montant GE</th>
            <td>{{ number_format($operation->garantieEmprunt->montant_total, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->nombre_logements_reserves)
        <tr>
            <td>Logements réservés (GE)</td>
            <td>{{ $operation->garantieEmprunt->nombre_logements_reserves }}</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->type_financement)
        <tr>
            <td>Financement</td>
            <td>{{ $operation->garantieEmprunt->type_financement }}</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->bureau_conseil)
        <tr>
            <td>Bureau/conseil</td>
            <td>{{ $operation->garantieEmprunt->bureau_conseil }}</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->numero_delib)
        <tr>
            <td>Délibération</td>
            <td>N° {{ $operation->garantieEmprunt->numero_delib }}</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->type_financement)
        <tr>
            <td>Délibération</td>
            <td><a href="#">Lien Fichier</a></td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_plai_construction)
        <tr>
            <td>Montant PLAI Const.</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_plai_construction, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_plai_foncier)
        <tr>
            <td>Montant PLAI Foncier</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_plai_foncier, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_pls_construction)
        <tr>
            <td>Montant PLS Const.</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_pls_construction, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_pls_foncier)
        <tr>
            <td>Montant PLS Foncier</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_pls_foncier, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_plus_construction)
        <tr>
            <td>Montant PLUS Construction</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_plus_construction, 0, ',', ' ') }} €</td>
        </tr>
        @endif
        @if ($operation->garantieEmprunt && $operation->garantieEmprunt->montant_plus_foncier)
        <tr>
            <td>Montant PLUS Foncier</td>
            <td>{{ number_format($operation->garantieEmprunt->montant_plus_foncier, 0, ',', ' ') }} €</td>
        </tr>
        @endif
    </table>
</div>
<div class="container mb-3">
    <a href="{{ route('operations.edit', $operation->id) }}" class="btn btn-primary btn-sm">Modifier</a>
    <form action="{{ route('operations.destroy', $operation->id) }}" metdod="POST" style="display:inline">
        @csrf
        {{-- @metdod('DELETE') --}}
        <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const addressEl = document.getElementById("adresse");
        const communeEl = document.getElementById("commune");
        const osmLink = document.getElementById("osmLink");

        // Si l'un des éléments manque, on stoppe
        if (!addressEl || !communeEl || !osmLink) return;

        // Récupère le texte brut et met à jour le lien
        const adresse = addressEl.textContent.trim();
        const commune = communeEl.textContent.trim();

        if (!adresse) {
            osmLink.href = "#";
            osmLink.classList.add("disabled");
        } else {
            const query = encodeURIComponent(`${adresse} ${commune}`);
            osmLink.href = `https://www.google.com/maps/search/?api=1&query=${query}`;
            osmLink.classList.remove("disabled");
        }
    });
</script>
@endpush