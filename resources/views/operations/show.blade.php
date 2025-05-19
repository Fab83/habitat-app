@extends('layouts.app')
<style>
body {
    line-height: 1;
    ;
}
</style>
@section('content')
<div class="container">
    <h1 class="display-6">Opération : {{ $operation->nom_operation }}</h1>
    <p class="fs-6 fst-italic">N'apparaissent que les données non vides</p>
    <table class="table">
        <tr>
            <td>Année programmation</td>
            <td>{{ $operation->annee_prog }}</td>

            <td>Bailleur</td>
            <td>{{ $operation->bailleur->nom }}</td>
        </tr>
        <tr>
            <td>Adresse</td>
            <td id="adresse" colspan="3">{{ $operation->adresse_operation }}
                <a href="#" id="osmLink" target="_blank" class="disabled osmLinked">Carte</a>
            </td>

        </tr>
        <tr>
            <td>Commune</td>
            <td id="commune">{{ $operation->commune_operation }}</td>


            @if ($operation->reference_cadastre)

            <td>Cadastre</td>
            <td>{{ $operation->reference_cadastre }}</td>
            @endif @if ($operation->vefa_mod)
        <tr>
            <td>VEFA/MOD</td>
            <td>{{ $operation->vefa_mod }}</td>

            @endif
            @if ($operation->neuf_aa)
            <td>Neuf / AA</td>
            <td>{{ $operation->neuf_aa }}</td>
        </tr>
        @endif
        @if ($operation->promoteur)
        <tr>
            <td>Promoteur</td>
            <td>{{ $operation->promoteur }}</td>
        </tr>
        @endif
        @if ($operation->numero_pc)
        <tr>
            <td>Numéro PC</td>
            <td>{{ $operation->numero_pc }}</td>
        </tr>
        @endif
        @if ($operation->date_pc)
        <tr>
            <td>Date PC</td>
            <td>{{ $operation->date_pc }}</td>
        </tr>
        @endif
        @if ($operation->pc)
        <tr>
            <td>PC</td>
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
            <td>Nombre logements</td>
            <td>{{ $operation->nombre_logements }}</td>

            @endif

            @if ($operation->nombre_lls)
            <td>Nombre LLS</td>
            <td>{{ $operation->nombre_lls }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plai_agrement)
        <tr>
            <td>Nombre PLAI Agrément</td>
            <td>{{ $operation->nombre_plai_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plai)
        <tr>
            <td>Nombre PLAI</td>
            <td>{{ $operation->nombre_plai }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plus_agrement)
        <tr>
            <td>Nombre PLUS Agrément</td>
            <td>{{ $operation->nombre_plus_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_plus)
        <td>Nombre PLUS</td>
        <td>{{ $operation->nombre_plus }}</td>
        <tr>
            @endif
            @if ($operation->nombre_pls_agrement)
        <tr>
            <td>Nombre PLS Agrément</td>
            <td>{{ $operation->nombre_pls_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_pls)
        <td>Nombre PLS</td>
        <td>{{ $operation->nombre_pls }}</td>
        </tr>
        @endif

        @if ($operation->nombre_ulsplus)
        <tr>
            <td>Nombre ULS+</td>
            <td>{{ $operation->nombre_ulsplus }}</td>
        </tr>
        @endif

        @if ($operation->nombre_ulspls)
        <tr>
            <td>Nombre ULS-</td>
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
            <td>Nombre LLI</td>
            <td>{{ $operation->nombre_lli }}</td>
        </tr>
        @endif
        @if ($operation->nombre_ulli)
        <tr>
            <td>Nombre ULLI</td>
            <td>{{ $operation->nombre_ulli }}</td>
        </tr>
        @endif

        <td>
            <h4 class="text-danger">ACCESSION</h4>
        </td>
        </tr>
        @if ($operation->nombre_psla_agrement)
        <tr>
            <td>Nombre PSLA Agrément</td>
            <td>{{ $operation->nombre_psla_agrement }}</td>
        </tr>
        @endif
        @if ($operation->nombre_psla)
        <tr>
            <td>Nombre PSLA</td>
            <td>{{ $operation->nombre_psla }}</td>
        </tr>
        @endif
        @if ($operation->nombre_brs)
        <tr>
            <td>Nombre BRS Agrément</td>
            <td>{{ $operation->nombre_brs }}</td>
        </tr>
        @endif
        <td>
            <h4 class="text-danger">LIVRAISON</h4>
        </td>
        @if($operation->date_livraison)
        <tr>
            <td>Date livraison</td>
            <td>{{ $operation->date_livraison }}</td>
        </tr>
        @endif
        @if($operation->nombre_logements_livres)
        <tr>
            <td>Nombre logements livrés</td>
            <td>{{ $operation->nombre_logements_livres }}</td>
        </tr>
        @endif
        @if($operation->rt)
        <tr>
            <td>RT</td>
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
            <td>Inventaire SRU</td>
            <td>{{ $operation->inventaire_sru }}</td>
        </tr>
        @endif
        @if($operation->sig)
        <tr>
            <td>SIG</td>
            <td>{{ $operation->sig }}</td>
        </tr>
        @endif
        @if($operation->commentaires)
        <tr>
            <td>Commentaires</td>
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
            <td>Montant GE</td>
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