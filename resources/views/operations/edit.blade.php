@extends('layouts.app')

@section('title', 'Modifier une opération')

@section('content')
    <div class="container">
        <h1 class="mb-4">Modifier l’opération</h1>

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

        <form action="{{ route('operations.update', $operation->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Onglets --}}
            <ul class="nav nav-tabs mb-3" id="operationTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-operation" data-bs-toggle="tab" data-bs-target="#operation"
                        type="button" role="tab">
                        Opération
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-logement" data-bs-toggle="tab" data-bs-target="#logement"
                        type="button" role="tab">
                        Logements
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-garantie" data-bs-toggle="tab" data-bs-target="#garantie"
                        type="button" role="tab">
                        Garanties emprunt
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="operationTabsContent">
                {{-- Onglet Opération --}}
                <div class="tab-pane fade show active" id="operation" role="tabpanel">
                    <div class="row g-2">
                        <div class="form-group">
                            <label for="programme_id">Programme</label>
                            <select name="programme_id" id="programme_id" class="form-control">
                                @foreach($programmes as $programme)
                                    <option value="{{ $programme->id }}" {{ old('programme_id', $operation->programme_id ?? '') == $programme->id ? 'selected' : '' }}>
                                        {{ $programme->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row g-2">
                        {{-- Nom --}}
                        <div class="col mb-3">
                            <label for="nom_operation" class="form-label">Opération</label>
                            <input type="text" name="nom_operation" class="form-control"
                                value="{{ old('nom_operation', $operation->nom_operation) }}" required>
                        </div>
                        {{-- Commune --}}
                        <div class="col mb-3">
                            <label for="commune_operation" class="form-label">Commune</label>
                            <input type="text" name="commune_operation" class="form-control"
                                value="{{ old('commune_operation', $operation->commune_operation) }}" required>
                        </div>
                        {{-- Bailleur --}}
                        <div class="col mb-3">
                            <label for="bailleur_id" class="form-label">Bailleur</label>
                            <select name="bailleur_id" class="form-select" required>
                                <option value="">-- Sélectionner un bailleur --</option>
                                @foreach ($bailleurs as $bailleur)
                                    <option value="{{ $bailleur->id }}"
                                        {{ old('bailleur_id', $operation->bailleur_id) == $bailleur->id ? 'selected' : '' }}>
                                        {{ $bailleur->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        {{-- Année --}}
                        <div class="col mb-3">
                            <label for="annee_prog" class="form-label">Année prog.</label>
                            <input type="text" name="annee_prog" class="form-control"
                                value="{{ old('annee_prog', $operation->annee_prog) }}">
                        </div>
                    </div>

                    <div class="row">
                        {{-- Adresse --}}
                        <div class="col-md-10 mb-3">
                            <label for="adresse" class="form-label">Adresse opération</label>
                            <input type="text" name="adresse_operation" id="adresse" class="form-control"
                                value="{{ old('adresse_operation', $operation->adresse_operation) }}" required>
                        </div>
                        <div class="col-md-2 mt-5 mb-3">
                            <label for=""></label>
                            <a href="#">SIG</a>
                        </div>
                    </div>
                    <hr class="my-3">
                    <div class="row g-2">
                        {{-- Cadastre --}}
                        <div class="col mb-3">
                            <label for="cadastre" class="form-label">Réf. cadastrale</label>
                            <input type="text" class="form-control" name="reference_cadastre" id="cadastre"
                                value="{{ old('reference_cadastre', $operation->reference_cadastre) }}">
                        </div>
                        {{-- Vefa/MOD --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">VEFA/MOD</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="vefa" value="VEFA"
                                    {{ old('vefa_mod', $operation->vefa_mod) == 'VEFA' ? 'checked' : '' }}>
                                <label class="form-check-label" for="vefa">VEFA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="mod"
                                    value="MOD" {{ old('vefa_mod', $operation->vefa_mod) == 'MOD' ? 'checked' : '' }}>
                                <label class="form-check-label" for="mod">MOD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="inconnu"
                                    value="VEFA/MOD inconnu"
                                    {{ old('vefa_mod', $operation->vefa_mod) == 'VEFA/MOD inconnu' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                        {{-- Neuf/AA --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">Neuf/acquis-amél.</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="neuf"
                                    value="Neuf" {{ old('neuf_aa', $operation->neuf_aa) == 'neuf' ? 'checked' : '' }}>
                                <label class="form-check-label" for="neuf">Neuf</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="aa"
                                    value="Acquis./Amel."
                                    {{ old('neuf_aa', $operation->neuf_aa) == 'Acquis./Amel.' ? 'checked' : '' }}>
                                <label class="form-check-label" for="aa">Acquis./Amél.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="inconnu"
                                    value="neuf-aa inconnu"
                                    {{ old('neuf_aa', $operation->neuf_aa) == 'neuf-aa inconnu' ? 'checked' : '' }}>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-md-3 mb-3">
                            <label for="promoteur" class="form-label">Promoteur</label>
                            <input type="text" name="promoteur" id="promoteur" class="form-control"
                                value="{{ old('promoteur', $operation->promoteur) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="numero_pc" class="form-label">N° permis de construire</label>
                            <input type="text" name="numero_pc" id="numero_pc" class="form-control"
                                value="{{ old('numero_pc', $operation->numero_pc) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="date_pc" class="form-label">Date PC</label>
                            <input type="date" name="date_pc" id="date_pc" class="form-control"
                                value="{{ old('date_pc', $operation->date_pc) }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pc" class="form-label">Fichier PC</label>
                            <input type="file" name="pc" id="pc" class="form-control"
                                value="{{ old('pc', $operation->pc) }}">
                        </div>
                    </div>
                    <hr class="mb-3">
                    <div class="row g-2 mb-3">
                        {{-- Livraison --}}
                        <div class="col-2">
                            <label for="dateLivraison" class="form-label">Date livraison</label>
                            <input type="text" class="form-control" id="dateLivraison" name="date_livraison"
                                value={{ old('date_livraison', $operation->date_livraison) }}>
                        </div>
                        <div class="col-2">
                            <label for="nbLivraison" class="form-label">Nb logements livrés</label>
                            <input type="integer" class="form-control" name="nombre_logements_livres" id="nbLivraison"
                                value={{ old('nombre_logements_livres', $operation->nombre_logements_livres) }}>
                        </div>

                        {{-- SRU --}}
                        <div class="col">
                            <label for="" class="form-label">Inv SRU</label><br>
                            <div class="form-check form-check-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="nd"
                                        value="SRU non renseigné"
                                        {{ old('inventaire_sru', $operation->inventaire_sru) == 'SRU non renseigné' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nd">Non renseigné</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="sru"
                                        value="Inv SRU"
                                        {{ old('inventaire_sru', $operation->inventaire_sru) == 'Inv SRU' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sru">SRU</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="pasSru"
                                        value="Non SRU"
                                        {{ old('inventaire_sru', $operation->inventaire_sru) == 'Non SRU' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pasSru">Non SRU</label>
                                </div>
                            </div>
                        </div>

                        {{-- SIG --}}
                        <div class="col">
                            <label for="" class="form-label">SIG</label><br>
                            <div class="form-check form-check-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sig" id="nd"
                                        value="SIG non renseigné"
                                        {{ old('sig', $operation->sig) == 'SIG non renseigné' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="nd">Non renseigné</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sig" id="sigOk"
                                        value="SIG ok" {{ old('sig', $operation->sig) == 'SIG ok' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sigOk">SIG OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sig" id="pasSIG"
                                        value="Non SIG" {{ old('sig', $operation->sig) == 'Non SIG' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="pasSIG">Non SIG</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="commentaires" class="form-label">Commentaires</label>
                            <textarea class="form-control" placeholder="Commentaires divers sur opération" id="commentaires"
                                name="commentaires">{{ old('commentaires', $operation->commentaires) }}</textarea>
                        </div>
                    </div>
                </div>
                {{-- Onglet Logements --}}
                <div class="tab-pane fade bg-info-subtle" id="logement" role="tabpanel">
                    <div class="row g-2">
                        <div class="col-6 mb-3">
                            <label for="nbLogements" class="form-label">Nombre logements total</label>
                            <input type="number" name="nombre_logements" id="nbLogements" class="form-control form-control-sm"
                                value="{{ old('nombre_logements', $operation->nombre_logements) }}">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nombre_lls" class="form-label">Nombre logements sociaux</label>
                            <input type="number" name="nombre_lls" id="nombre_lls" class="form-control form-control-sm"
                                value="{{ old('nombre_lls', $operation->nombre_lls) }}">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_plai_agrement" class="form-label">Nb PLAI (agrément)</label>
                            <input type="number" name="nombre_plai_agrement" id="nombre_plai_agrement"
                                class="form-control" value="{{ old('nombre_plai_agrement', $operation->nombre_plai_agrement) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plai" class="form-label">Nb PLAI</label>
                            <input type="number" name="nombre_plai" id="nombre_plai" class="form-control"
                                value="{{ old('nombre_plai', $operation->nombre_plai) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plus_agrement" class="form-label">Nb PLUS (agrément)</label>
                            <input type="number" name="nombre_plus_agrement" id="nombre_plus_agrement"
                                class="form-control" value="{{ old('nombre_plus_agrement', $operation->nombre_plus_agrement) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plus" class="form-label">Nb PLUS</label>
                            <input type="number" name="nombre_plus" id="nombre_plus" class="form-control"
                                value="{{ old('nombre_plus', $operation->nombre_plus) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulsplus" class="form-label">Nb ulsplus</label>
                            <input type="number" name="nombre_ulsplus" id="nombre_ulsplus" class="form-control"
                                value="{{ old('nombre_ulsplus', $operation->nombre_ulsplus) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulspls" class="form-label">Nb ULSPLS</label>
                            <input type="number" name="nombre_ulspls" id="nombre_ulspls" class="form-control"
                                value="{{ old('nombre_ulspls', $operation->nombre_ulspls) }}">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_pls_agrement" class="form-label">Nb PLS (agrément)</label>
                            <input type="number" name="nombre_pls_agrement" id="nombre_pls_agrement"
                                class="form-control" value="{{ old('nombre_pls_agrement', $operation->nombre_pls_agrement) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_pls" class="form-label">Nb PLS</label>
                            <input type="number" name="nombre_pls" id="nombre_pls" class="form-control"
                                value="{{ old('nombre_pls', $operation->nombre_pls) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_lli" class="form-label">Nb LLI</label>
                            <input type="number" name="nombre_lli" id="nombre_lli" class="form-control"
                                value="{{ old('nombre_lli', $operation->nombre_lli) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulli" class="form-label">Nb ULLI</label>
                            <input type="number" name="nombre_ulli" id="nombre_ulli" class="form-control"
                                value="{{ old('nombre_ulli', $operation->nombre_ulli) }}">
                        </div>
                    </div>
                    <hr class="my-2">
                    <p class="lead text-center">Accession</p>
                    <hr class="my-2">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_psla_agrement" class="form-label">Nb PSLA (agrément)</label>
                            <input type="number" name="nombre_psla_agrement" id="nombre_psla_agrement"
                                class="form-control" value="{{ old('nombre_psla_agrement', $operation->nombre_psla_agrement) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_psla" class="form-label">Nb PSLA</label>
                            <input type="number" name="nombre_psla" id="nombre_psla" class="form-control"
                                value="{{ old('nombre_psla', $operation->nombre_psla) }}">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_brs" class="form-label">Nb BRS</label>
                            <input type="number" name="nombre_brs" id="nombre_brs" class="form-control"
                                value="{{ old('nombre_brs', $operation->nombre_brs) }}">
                        </div>
                    </div>
                </div>
                
                {{-- Fix the garantie tab inputs --}}
                <div class="tab-pane fade bg-success-subtle" id="garantie" role="tabpanel">
                    <div class="container roundForm green">
                        <h1 class="display-6">Garanties Emprunt</h1>
                        <div class="row g-2">
                            <div class="col-md-6 mb-3">
                                <label for="montant_total" class="form-label">Montant total</label>
                                <input type="number" 
                                    name="garantie_emprunt[montant_total]" 
                                    id="montant_total"
                                    class="form-control form-control-sm"
                                    value="{{ old('garantie_emprunt.montant_total', $operation->garantieEmprunt->montant_total ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_plai_construction" class="form-label">Montant PLAI Construction</label>
                                <input type="number" name="montant_plai_construction" id="montant_plai_construction"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_plai_construction', $operation->garantieEmprunt->montant_plai_construction ?? 0) }}"
                                                            {{-- <input type="number" name="montant_plai_construction" id="montant_plai_construction"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plai_construction', $operation->garantieEmprunt->montant_plai_construction ?? '') }}"> --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_plai_foncier" class="form-label">Montant PLAI Foncier</label>
                                <input type="number" name="montant_plai_foncier" id="montant_plai_foncier"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_plai_foncier', $operation->garantieEmprunt->montant_plai_foncier ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_pls_construction" class="form-label">Montant PLS Construction</label>
                                <input type="number" name="montant_pls_construction" id="montant_pls_construction"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_pls_construction', $operation->garantieEmprunt->montant_pls_construction ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_pls_foncier" class="form-label">Montant PLS Foncier</label>
                                <input type="number" name="montant_pls_foncier" id="montant_pls_foncier"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_pls_foncier', $operation->garantieEmprunt->montant_pls_foncier ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_plus_construction" class="form-label">Montant PLUS Construction</label>
                                <input type="number" name="montant_plus_construction" id="montant_plus_construction"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_plus_construction', $operation->garantieEmprunt->montant_plus_construction ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_plus_foncier" class="form-label">Montant PLUS Foncier</label>
                                <input type="number" name="montant_plus_foncier" id="montant_plus_foncier"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_plus_foncier', $operation->garantieEmprunt->montant_plus_foncier ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_phb2" class="form-label">Montant PHB2</label>
                                <input type="number" name="montant_phb2" id="montant_phb2"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_phb2', $operation->garantieEmprunt->montant_phb2 ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="montant_booster" class="form-label">Montant Booster</label>
                                <input type="number" name="montant_booster" id="montant_booster"
                                    class="form-control form-control-sm"
                                    value="{{ old('montant_booster', $operation->garantieEmprunt->montant_booster ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="date_deliberation" class="form-label">Date Délibération</label>
                                <input type="date" name="date_deliberation" id="date_deliberation"
                                    class="form-control form-control-sm"
                                    value="{{ old('date_deliberation', $operation->garantieEmprunt->date_deliberation ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nombre_logements_reserves" class="form-label">Nombre de logements réservés</label>
                                <input type="number" name="nombre_logements_reserves" id="nombre_logements_reserves"
                                    class="form-control form-control-sm"
                                    value="{{ old('nombre_logements_reserves', $operation->garantieEmprunt->nombre_logements_reserves ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="type_financement" class="form-label">Type de financement</label>
                                <input type="text" name="type_financement" id="type_financement"
                                    class="form-control form-control-sm"
                                    value="{{ old('type_financement', $operation->garantieEmprunt->type_financement ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="numero_delib" class="form-label">Numéro Délibération</label>
                                <input type="text" name="numero_delib" id="numero_delib"
                                    class="form-control form-control-sm"
                                    value="{{ old('numero_delib', $operation->garantieEmprunt->numero_delib ?? '') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="bureau_conseil" class="form-label">Bureau Conseil</label>
                                <select name="bureau_conseil" id="bureau_conseil" class="form-select form-select-sm">
                                    <option value="Bureau"
                                        {{ old('garantie_emprunt.bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Bureau' ? 'selected' : '' }}>
                                        Bureau</option>
                                    <option value="Conseil"
                                        {{ old('garantie_emprunt.bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Conseil' ? 'selected' : '' }}>
                                        Conseil</option>
                                    <option value="Non renseigné"
                                        {{ old('garantie_emprunt.bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Non renseigné' ? 'selected' : '' }}>
                                        Non renseigné</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Fix the date inputs --}}
                <div class="col-2">
                    <label for="dateLivraison" class="form-label">Date livraison</label>
                    <input type="date" class="form-control" id="dateLivraison" name="date_livraison"
                        value="{{ old('date_livraison', $operation->date_livraison) }}">
                </div>
                <div class="row">
                    <div class="col">
                        <label for="commentaires" class="form-label">Commentaires</label>
                        <textarea class="form-control" placeholder="Commentaires divers sur opération" id="commentaires"
                            name="commentaires">{{ old('commentaires', $operation->commentaires) }}</textarea>
                    </div>
                </div>
            </div>
            {{-- Onglet Garanties --}}
            <div class="tab-pane fade bg-success-subtle" id="garantie" role="tabpanel">
                <div class="container roundForm green">
                    <h1 class="display-6">Garanties Emprunt</h1>
                    <div class="row g-2">
                        <div class="col-md-6 mb-3">
                            <label for="montant_total" class="form-label">Montant total</label>
                            <input type="number" name="montant_total" id="montant_total"
                                class="form-control form-control-sm"
                                value="{{ old('montant_total', $operation->garantieEmprunt->montant_total ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_plai_construction" class="form-label">Montant PLAI Construction</label>
                            <input type="number" name="montant_plai_construction" id="montant_plai_construction"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plai_construction', $operation->garantieEmprunt->montant_plai_construction ?? 0) }}"
}}">
                                                            {{-- <input type="number" name="montant_plai_construction" id="montant_plai_construction"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plai_construction', $operation->garantieEmprunt->montant_plai_construction ?? '') }}"> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_plai_foncier" class="form-label">Montant PLAI Foncier</label>
                            <input type="number" name="montant_plai_foncier" id="montant_plai_foncier"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plai_foncier', $operation->garantieEmprunt->montant_plai_foncier ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_pls_construction" class="form-label">Montant PLS Construction</label>
                            <input type="number" name="montant_pls_construction" id="montant_pls_construction"
                                class="form-control form-control-sm"
                                value="{{ old('montant_pls_construction', $operation->garantieEmprunt->montant_pls_construction ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_pls_foncier" class="form-label">Montant PLS Foncier</label>
                            <input type="number" name="montant_pls_foncier" id="montant_pls_foncier"
                                class="form-control form-control-sm"
                                value="{{ old('montant_pls_foncier', $operation->garantieEmprunt->montant_pls_foncier ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_plus_construction" class="form-label">Montant PLUS Construction</label>
                            <input type="number" name="montant_plus_construction" id="montant_plus_construction"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plus_construction', $operation->garantieEmprunt->montant_plus_construction ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_plus_foncier" class="form-label">Montant PLUS Foncier</label>
                            <input type="number" name="montant_plus_foncier" id="montant_plus_foncier"
                                class="form-control form-control-sm"
                                value="{{ old('montant_plus_foncier', $operation->garantieEmprunt->montant_plus_foncier ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_phb2" class="form-label">Montant PHB2</label>
                            <input type="number" name="montant_phb2" id="montant_phb2"
                                class="form-control form-control-sm"
                                value="{{ old('montant_phb2', $operation->garantieEmprunt->montant_phb2 ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="montant_booster" class="form-label">Montant Booster</label>
                            <input type="number" name="montant_booster" id="montant_booster"
                                class="form-control form-control-sm"
                                value="{{ old('montant_booster', $operation->garantieEmprunt->montant_booster ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_deliberation" class="form-label">Date Délibération</label>
                            <input type="date" name="date_deliberation" id="date_deliberation"
                                class="form-control form-control-sm"
                                value="{{ old('date_deliberation', $operation->garantieEmprunt->date_deliberation ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nombre_logements_reserves" class="form-label">Nombre de logements réservés</label>
                            <input type="number" name="nombre_logements_reserves" id="nombre_logements_reserves"
                                class="form-control form-control-sm"
                                value="{{ old('nombre_logements_reserves', $operation->garantieEmprunt->nombre_logements_reserves ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="type_financement" class="form-label">Type de financement</label>
                            <input type="text" name="type_financement" id="type_financement"
                                class="form-control form-control-sm"
                                value="{{ old('type_financement', $operation->garantieEmprunt->type_financement ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="numero_delib" class="form-label">Numéro Délibération</label>
                            <input type="text" name="numero_delib" id="numero_delib"
                                class="form-control form-control-sm"
                                value="{{ old('numero_delib', $operation->garantieEmprunt->numero_delib ?? '') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="bureau_conseil" class="form-label">Bureau Conseil</label>
                            <select name="bureau_conseil" id="bureau_conseil" class="form-select form-select-sm">
                                <option value="Bureau"
                                    {{ old('bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Bureau' ? 'selected' : '' }}>
                                    Bureau</option>
                                <option value="Conseil"
                                    {{ old('bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Conseil' ? 'selected' : '' }}>
                                    Conseil</option>
                                <option value="Non renseigné"
                                    {{ old('bureau_conseil', $operation->garantieEmprunt->bureau_conseil ?? '') == 'Non renseigné' ? 'selected' : '' }}>
                                    Non renseigné</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="date_bureau_conseil" class="form-label">Date Bureau/Conseil</label>
                            <input type="date" name="date_bureau_conseil" id="date_bureau_conseil"
                                class="form-control form-control-sm"
                                value="{{ old('date_bureau_conseil', $operation->garantieEmprunt->date_bureau_conseil ?? '') }}">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('operations.index') }}" class="btn btn-secondary">Annuler</a>
    </div>
    </form>
    </div>
@endsection
