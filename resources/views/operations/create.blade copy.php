@extends('layouts.app')
<style>
.osmLinked {
    display: inline-block;
    font-weight: 400;
    min-width: 3rem;
    color: #fff;
    text-align: center;
    vertical-align: middle;
    user-select: none;
    background-color: #76b881;
    border: 1px solid #387442;
    line-height: 1.5;
    border-radius: 0.375rem;
    text-decoration: none;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
        border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    padding: 0.5rem 0.25rem;
    font-size: 0.75rem;
    margin-top: 2rem
}
</style>
@section('title', 'Créer une opération')

@section('content')

<div class="container bg-light p-4 border border-dark-subtle rounded-4 my-5">
    <h1 class="mb-4">Ajouter une opération</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('operations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Onglets --}}
        <ul class="nav nav-tabs mb-3" id="operationTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="tab-operation" data-bs-toggle="tab" data-bs-target="#operation"
                    type="button" role="tab">
                    Opération
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-logement" data-bs-toggle="tab" data-bs-target="#logement" type="button"
                    role="tab">
                    Logements
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-subvention" data-bs-toggle="tab" data-bs-target="#subvention"
                    type="button" role="tab">
                    Subventions
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="tab-garantie" data-bs-toggle="tab" data-bs-target="#garantie" type="button"
                    role="tab">
                    Garanties Emprunt
                </button>
            </li>
        </ul>

        <div class="tab-content" id="operationTabsContent">
            {{-- Onglet Opération --}}
            <div class="tab-pane fade show active" id="operation" role="tabpanel">
                <div class="container roundForm green">
                    <h1 class="display-6">Présentation</h1>
                    <div class="row g-2 mb-3">
                        @csrf
                        <div class="col-md-3">
                            <label for="programme_id" class="form-label">Programme</label>
                            <select name="programme_id" id="programme_id" class="form-control form-control-sm">
                                @foreach ($programmes as $programme)
                                <option value="{{ $programme->id }}"
                                    {{ old('programme_id', $programme_id ?? '') == $programme->id ? 'selected' : '' }}>
                                    {{ $programme->nom }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Nom --}}
                        <div class="col-md-3 mb-3">
                            <label for="nom_operation" class="form-label">Nom de l’opération</label>
                            <input type="text" name="nom_operation" id="nom_operation"
                                class="form-control form-control-sm" value="{{ old('nom_operation') }}" required>
                        </div>
                        {{-- Commune --}}
                        <div class="col-md-3 mb-3">
                            <label for="commune" class="form-label">Commune</label>
                            <select name="commune_operation" id="commune" class="form-select form-select-sm">
                                <option value="">-- Sélectionner une commune --</option>
                                <option value="Les Adrets">Les Adrets</option>
                                <option value="Fréjus">Fréjus</option>
                                <option value="Puget/Argens">Puget/Argens</option>
                                <option value="Roquebrune/Argens">Roquebrune/Argens</option>
                                <option value="Saint-Raphaël">Saint-Raphaël</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                        {{-- Bailleur --}}
                        <div class="col-md-3 mb-3">
                            <label for="bailleur_id" class="form-label">Bailleur (<a
                                    href="{{ route('bailleurs.create') }}"
                                    onclick="openBailleurPopup(this.href); return false;">ajouter</a>)</label>
                            <select name="bailleur_id" id="bailleur_id" class="form-select form-select-sm" required>
                                <option value="">-- Sélectionner un bailleur --</option>
                                @foreach ($bailleurs as $bailleur)
                                <option value="{{ $bailleur->id }}"
                                    {{ old('bailleur_id') == $bailleur->id ? 'selected' : '' }}>
                                    {{ $bailleur->nom }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="annulation" id="annulation_oui"
                                value="oui">
                            <label class="form-check-label" for="annulation_oui">Annulée</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="annulation" id="annulation_non"
                                value="non" checked>
                            <label class="form-check-label" for="annulation_non">Non annulée</label>
                        </div>
                    </div>
                    <div class="row">
                        {{-- Année prog --}}
                        <div class="col-md-2 mb-3">
                            <label for="année_prog" class="form-label">Année de programmation</label>
                            <input type="text" name="annee_prog" id="année_prog" class="form-control form-control-sm"
                                value="{{ old('annee_prog') }}">
                        </div>
                        {{-- Adresse --}}
                        <div class="col-md-6 mb-3">
                            <label for="adresse" class="form-label">Adresse opération</label>
                            <input type="text" name="adresse_operation" id="adresse"
                                class="form-control form-control-sm" value="{{ old('adresse_operation') }}" required>
                        </div>
                        <div class="col">
                            <a href="#" id="osmLink" target="_blank" class="disabled osmLinked">Carte</a>
                            <a href="#" class="disabled osmLinked">SIG</a>
                        </div>
                    </div>
                    <div class="row g-2">
                        {{-- Vefa/MOD --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">VEFA/MOD</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="vefa" value="VEFA">
                                <label class="form-check-label" for="vefa">VEFA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="mod" value="MOD">
                                <label class="form-check-label" for="mod">MOD</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="inconnu"
                                    value="VEFA/MOD inconnu" checked>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                        {{-- Neuf/AA --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">Neuf/acquis-amél.</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="neuf" value="Neuf">
                                <label class="form-check-label" for="neuf">Neuf</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="aa"
                                    value="Acquis./Amel.">
                                <label class="form-check-label" for="aa">Acquis./Amél.</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="inconnu"
                                    value="neuf-aa inconnu inconnu" checked>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                        {{-- SRU --}}
                        <div class="col">
                            <label for="" class="form-label">Inv SRU</label><br>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inventaire_sru" id="nd"
                                    value="SRU non renseigné" checked>
                                <label class="form-check-label" for="nd">Non renseigné</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inventaire_sru" id="sru"
                                    value="Inv SRU">
                                <label class="form-check-label" for="sru">Inv. SRU</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="inventaire_sru" id="pasSru"
                                    value="Non SRU">
                                <label class="form-check-label" for="pasSru">Non SRU</label>
                            </div>
                        </div>

                        {{-- SIG --}}
                        <div class="col">
                            <label for="" class="form-label">SIG</label><br>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sig" id="nd"
                                    value="SIG non renseigné" checked>
                                <label class="form-check-label" for="nd">Non renseigné</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sig" id="sigOk" value="SIG ok">
                                <label class="form-check-label" for="sigOk">SIG OK</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sig" id="pasSIG" value="Non SIG">
                                <label class="form-check-label" for="pasSIG">Non SIG</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="nbLogements" class="form-label">Total logements PC</label>
                            <input type="number" name="nombre_logements" id="nbLogements"
                                class="form-control form-control-sm">
                        </div>
                        {{-- Livraison --}}
                        <div class="col-md-2">
                            <label for="dateLivraison" class="form-label">Date livraison</label>
                            <input type="text" class="form-control form-control-sm" id="dateLivraison"
                                name="date_livraison">
                        </div>
                        <div class="col-md-2">
                            <label for="nbLivraison" class="form-label">Nb logements livrés</label>
                            <input type="integer" class="form-control form-control-sm" name="nombre_logements_livres"
                                id="nbLivraison">
                        </div>
                    </div>
                </div>

                <div class="container roundForm orange">
                    <h1 class="display-6">Permis</h1>
                    <div class="row g-2">
                        {{-- Cadastre --}}
                        <div class="col md-2">
                            <label for="cadastre" class="form-label">Réf. cadastrale</label>
                            <input type="text" class="form-control form-control-sm" name="reference_cadastre"
                                id="cadastre" value="{{ old('reference_cadastre') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="promoteur" class="form-label">Promoteur</label>
                            <input type="text" name="promoteur" id="promoteur" class="form-control form-control-sm"
                                value="{{ old('promoteur') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="numero_pc" class="form-label">N° permis de construire</label>
                            <input type="text" name="numero_pc" id="numero_pc" class="form-control form-control-sm"
                                value="{{ old('numero_pc') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="date_pc" class="form-label">Date PC</label>
                            <input type="text" name="date_pc" id="date_pc" class="form-control form-control-sm"
                                value="{{ old('date_pc') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="pc" class="form-label">Fichier PC</label>
                            <input type="file" name="pc" id="pc" class="form-control form-control-sm"
                                value="{{ old('pc') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="commentaires" class="form-label">Commentaires</label>
                        <textarea class="form-control form-control-sm" placeholder="Commentaires divers sur opération"
                            id="commentaires" name="commentaires"></textarea>
                    </div>
                </div>
            </div>

            {{-- Onglet Logements --}}
            <div class="tab-pane fade" id="logement" role="tabpanel">
                <div class="container roundForm green">
                    <h1 class="display-6">Locatif - Agréments</h1>
                    <div class="row g-2">
                        <div class="col-md-2 mb-3">
                            <label for="nombre_plai_agrement" class="form-label fw-bold">PLAI (agrément)</label>
                            <input type="number" name="nombre_plai_agrement" id="nombre_plai_agrement"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_plai" class="form-label">PLAI (si différent)</label>
                            <input type="number" name="nombre_plai" id="nombre_plai"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_plus_agrement" class="form-label fw-bold">PLUS (agrément)</label>
                            <input type="number" name="nombre_plus_agrement" id="nombre_plus_agrement"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_plus" class="form-label">PLUS (si différent)</label>
                            <input type="number" name="nombre_plus" id="nombre_plus"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_pls_agrement" class="form-label fw-bold">Nb PLS (agrément)</label>
                            <input type="number" name="nombre_pls_agrement" id="nombre_pls_agrement"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_pls" class="form-label">Nb PLS</label>
                            <input type="number" name="nombre_pls" id="nombre_pls" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-2 mb-3">
                            <label for="nombre_ulsplus" class="form-label">Nb ulsplus</label>
                            <input type="number" name="nombre_ulsplus" id="nombre_ulsplus"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_ulspls" class="form-label">Nb ULSPLS</label>
                            <input type="number" name="nombre_ulspls" id="nombre_ulspls"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_lls" class="form-label fw-bold text-danger">Total LLS</label>
                            <input type="number" name="nombre_lls" id="nombre_lls" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-2 mb-3">
                            <label for="nombre_lli" class="form-label">Nb LLI</label>
                            <input type="number" name="nombre_lli" id="nombre_lli" class="form-control form-control-sm">
                        </div>
                        <div class="col-2 mb-3">
                            <label for="nombre_ulli" class="form-label">Nb ULLI</label>
                            <input type="number" name="nombre_ulli" id="nombre_ulli"
                                class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
                <div class="container roundForm orange">
                    <h1 class="display-6">Accession</h1>
                    <div class="row g-2">
                        <div class="col-md-2 mb-3">
                            <label for="nombre_psla_agrement" class="form-label fw-bold">Nb PSLA (agrément)</label>
                            <input type="number" name="nombre_psla_agrement" id="nombre_psla_agrement"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_psla" class="form-label">Nb PSLA</label>
                            <input type="number" name="nombre_psla" id="nombre_psla"
                                class="form-control form-control-sm">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="nombre_brs" class="form-label">Nb BRS</label>
                            <input type="number" name="nombre_brs" id="nombre_brs" class="form-control form-control-sm">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Onglet Subventions --}}
            <div class="tab-pane fade bg-success-subtle" id="subvention" role="tabpanel">
                <div class="container roundForm green">
                    <h1 class="display-6">Subventions</h1>
                    <div class="row g-2">
                        <div class="col-md-2 mb-3">
                            <label for="date_deliberation_subvention" class="form-label">Date délibération
                                subvention</label>
                            <input type="date" name="garantie_emprunt[date_deliberation_subvention]"
                                id="date_deliberation_subvention" class="form-control form-control-sm"
                                placeholder="Année de délibération">
                        </div>
                        <div class=" col-md-1 mb-3">
                            <label for="numero_delib_subvention" class="form-label">N° délib.</label>
                            <input type="text" name="garantie_emprunt[numero_delib_subvention]"
                                id="numero_delib_subvention" class="form-control form-control-sm">
                        </div>
                        <div class="col mb-3">
                            <label for="montant_subvention_agglo" class="form-label">Montant subvention</label>
                            <input type="text" name="garantie_emprunt[montant_subvention_agglo]"
                                id="montant_subvention_agglo" class="form-control form-control-sm"
                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                        </div>
                        <div class="col mb-3">
                            <label for="montant_cret" class="form-label">Montant CRET</label>
                            <input type="text" name="garantie_emprunt[montant_cret]" id="montant_cret"
                                class="form-control form-control-sm" placeholder="Si non nul" oninput=" this.value=this.value.replace(/\D/g, ''
                                ).replace(/\B(?=(\d{3})+(?!\d))/g, ' ' );">
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="date_cret" class="form-label">Date CRET</label>
                            <input type="text" name="garantie_emprunt[date_cret]" id="date_cret"
                                class="form-control form-control-sm" placeholder="Année de délibération">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Onglet Garanties --}}
            <div class="tab-pane fade bg-success-subtle" id="garantie" role="tabpanel">
                <div class="container roundForm green">
                    <h1 class="display-6">Garanties Emprunt</h1>
                    <div class="row g-2">
                        <p class="fs-3">PLAI</p>
                        <div class="col-md-3 mb-3">
                            <label for="montant_plai_construction" class="form-label">Montant PLAI
                                Construction</label>
                            <input type="text" name="garantie_emprunt[montant_plai_construction]"
                                id="montant_plai_construction" class="form-control form-control-sm"
                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="montant_plai_foncier" class="form-label">Montant PLAI Foncier</label>
                            <input type="text" name="montant_plai_foncier" id="montant_plai_foncier"
                                class="form-control form-control-sm"
                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                        </div>
                    </div>
                    <div class="row g-2">
                        <p class="fs-3">PLUS</p>
                        <div class="col-md-3 mb-3">
                            <label for="montant_pls_construction" class="form-label">Montant PLS
                                Construction</label>
                            <input type="text" name="montant_pls_construction" id="montant_pls_construction"
                                class="form-control form-control-sm"
                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="montant_pls_foncier" class="form-label">Montant PLS Foncier</label>
                            <input type="text" name="montant_pls_foncier" id="montant_pls_foncier"
                                class="form-control form-control-sm"
                                oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_plus_construction" class="form-label">Montant PLUS
                            Construction</label>
                        <input type="text" name="montant_plus_construction" id="montant_plus_construction"
                            class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_plus_foncier" class="form-label">Montant PLUS Foncier</label>
                        <input type="text" name="montant_plus_foncier" id="montant_plus_foncier"
                            class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_phb2" class="form-label">Montant PHB2</label>
                        <input type="text" name="montant_phb2" id="montant_phb2" class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_booster" class="form-label">Montant Booster</label>
                        <input type="text" name="montant_booster" id="montant_booster"
                            class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="montant_total" class="form-label">Montant total</label>
                        <input type="text" name="garantie_emprunt[montant_total]" id="montant_total"
                            class="form-control form-control-sm"
                            oninput="this.value = this.value.replace(/\D/g, '').replace(/\B(?=(\d{3})+(?!\d))/g, ' ');">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date_deliberation" class="form-label">Date Délibération</label>
                        <input type="date" name="date_deliberation" id="date_deliberation"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="nombre_logements_reserves" class="form-label">Nombre de logements
                            réservés</label>
                        <input type="number" name="nombre_logements_reserves" id="nombre_logements_reserves"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="type_financement" class="form-label">Type de financement</label>
                        <input type="text" name="type_financement" id="type_financement"
                            class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="numero_delib" class="form-label">Numéro Délibération</label>
                        <input type="text" name="numero_delib" id="numero_delib" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="bureau_conseil" class="form-label">Bureau Conseil</label>
                        <select name="bureau_conseil" id="bureau_conseil" class="form-select form-select-sm">
                            <option value="Bureau">Bureau</option>
                            <option value="Conseil">Conseil</option>
                            <option value="Non renseigné" selected>Non renseigné</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="date_bureau_conseil" class="form-label">Date Bureau/Conseil</label>
                        <input type="date" name="date_bureau_conseil" id="date_bureau_conseil"
                            class="form-control form-control-sm">
                    </div>
                    <div class="mb-3">
                        <label for="deliberation" class="form-label">Délibération (fichier)</label>
                        <input type="file" name="deliberation" id="deliberation" class="form-control">
                    </div>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary my-3">Enregistrer</button>
        <a href="{{ route('operations.index') }}" class="btn btn-secondary my-3">Annuler</a>
    </form>
</div>
@endsection
<script>
// On attend que le DOM soit entièrement chargé
document.addEventListener('DOMContentLoaded', function() {
    const addressInput = document.getElementById('adresse');
    const communeSelect = document.getElementById('commune');
    const osmLink = document.getElementById('osmLink');

    // Met à jour href et l’état visuel du lien
    function updateLink() {
        const adresse = addressInput.value.trim();
        const commune = communeSelect.value;
        if (!adresse) {
            osmLink.href = '#';
            osmLink.classList.add('disabled');
        } else {
            const query = encodeURIComponent(`${adresse} ${commune}`);
            // osmLink.href = `https://www.openstreetmap.org/search?query=${query}`;
            osmLink.href = `https://www.google.com/maps/search/?api=1&query=${query}`;

            osmLink.classList.remove('disabled');
        }
    }

    // Sur chaque saisie ou changement, on régénère l’URL
    addressInput.addEventListener('input', updateLink);
    communeSelect.addEventListener('change', updateLink);

    // Optionnel : message d’alerte si on clique sans adresse
    osmLink.addEventListener('click', function(e) {
        if (!addressInput.value.trim()) {
            e.preventDefault();
            alert('Veuillez saisir une adresse avant de voir la carte.');
        }
    });

    // Initialisation au chargement de la page
    updateLink();
});
</script>
<script>
let popup;

function openBailleurPopup(url) {
    popup = window.open(url, 'popup', 'width=600,height=600');
    let timer = setInterval(function() {
        if (popup.closed) {
            clearInterval(timer);
            location.reload(); // recharge la page quand la popup est fermée
        }
    }, 500);
}
</script>