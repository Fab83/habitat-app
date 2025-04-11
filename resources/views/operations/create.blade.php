@extends('layouts.app')

@section('title', 'Créer une opération')

@section('content')
    <div class="container bg-light p-4 border border-dark-subtle rounded-4">
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

        <form action="{{ route('operations.store') }}" method="POST">
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
                    <button class="nav-link" id="tab-logement" data-bs-toggle="tab" data-bs-target="#logement"
                        type="button" role="tab">
                        Logements
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-garantie" data-bs-toggle="tab" data-bs-target="#garantie"
                        type="button" role="tab">
                        Garanties Emprunt
                    </button>
                </li>
            </ul>

            <div class="tab-content" id="operationTabsContent">
                {{-- Onglet Opération --}}
                <div class="tab-pane fade show active" id="operation" role="tabpanel">
                    <div class="row g-2">
                        {{-- Nom --}}
                        <div class="col-md-4 mb-3">
                            <label for="nom_operation" class="form-label">Nom de l’opération</label>
                            <input type="text" name="nom_operation" id="nom_operation" class="form-control"
                                value="{{ old('nom_operation') }}" required>
                        </div>

                        {{-- Commune --}}
                        <div class="col mb-3">
                            <label for="commune" class="form-label">Commune</label>
                            <select name="commune_operation" id="commune" class="form-select">
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
                        <div class="col mb-3">
                            <label for="bailleur_id" class="form-label">Bailleur (<a href="{{ route('bailleurs.create') }}"
                                onclick="openBailleurPopup(this.href); return false;">ajouter</a>)</label>
                            <select name="bailleur_id" id="bailleur_id" class="form-select" required>
                                <option value="">-- Sélectionner un bailleur --</option>
                                @foreach ($bailleurs as $bailleur)
                                    <option value="{{ $bailleur->id }}"
                                        {{ old('bailleur_id') == $bailleur->id ? 'selected' : '' }}>
                                        {{ $bailleur->nom }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Année prog --}}
                        <div class="col mb-3">
                            <label for="année_prog" class="form-label">Année de programmation</label>
                            <input type="text" name="annee_prog" id="année_prog" class="form-control"
                                value="{{ old('annee_prog') }}">
                        </div>
                    </div>

                    <div class="row">
                        {{-- Adresse --}}
                        <div class="col-md-10 mb-3">
                            <label for="adresse" class="form-label">Adresse opération</label>
                            <input type="text" name="adresse_operation" id="adresse" class="form-control"
                                value="{{ old('adresse_operation') }}" required>
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
                                value="{{ old('reference_cadastre') }}">
                        </div>
                        {{-- Vefa/MOD --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">VEFA/MOD</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="vefa"
                                    value="VEFA">
                                <label class="form-check-label" for="vefa">VEFA</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="mod"
                                    value="MOD">
                                <label class="form-check-label" for="mod">MOD</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="vefa_mod" id="inconnu"
                                    value="VEFA/MOD inconnu" checked>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                        {{-- Neuf/AA --}}
                        <div class="col mb-3">
                            <label for="" class="form-label">Neuf/acquis-amél.</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="neuf"
                                    value="Neuf">
                                <label class="form-check-label" for="neuf">Neuf</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="aa"
                                    value="Acquis./Amel.">
                                <label class="form-check-label" for="aa">Acquis./Amél.</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="neuf_aa" id="inconnu"
                                    value="neuf-aa inconnu inconnu" checked>
                                <label class="form-check-label" for="inconnu">Inconnu</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="promoteur" class="form-label">Promoteur</label>
                            <input type="text" name="promoteur" id="promoteur" class="form-control"
                                value="{{ old('promoteur') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="numero_pc" class="form-label">N° permis de construire</label>
                            <input type="text" name="numero_pc" id="numero_pc" class="form-control"
                                value="{{ old('numero_pc') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="date_pc" class="form-label">Date PC</label>
                            <input type="date" name="date_pc" id="date_pc" class="form-control"
                                value="{{ old('date_pc') }}">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="pc" class="form-label">Fichier PC</label>
                            <input type="file" name="pc" id="pc" class="form-control"
                                value="{{ old('pc') }}">
                        </div>
                    </div>

                    <hr class="mb-3">

                    <div class="row g-2 mb-3">
                        {{-- Livraison --}}
                        <div class="col-2">
                            <label for="dateLivraison" class="form-label">Date livraison</label>
                            <input type="text" class="form-control" id="dateLivraison" name="date_livraison">
                        </div>
                        <div class="col-2">
                            <label for="nbLivraison" class="form-label">Nb logements livrés</label>
                            <input type="integer" class="form-control" name="nombre_logements_livres" id="nbLivraison">
                        </div>

                        {{-- SRU --}}
                        <div class="col">
                            <label for="" class="form-label">Inv SRU</label><br>
                            <div class="form-check form-check-inline">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="nd"
                                        value="SRU non renseigné" checked>
                                    <label class="form-check-label" for="nd">Non renseigné</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="sru"
                                        value="Inv SRU">
                                    <label class="form-check-label" for="sru">SRU</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inventaire_sru" id="pasSru"
                                        value="Non SRU">
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
                                        value="SIG non renseigné" checked>
                                    <label class="form-check-label" for="nd">Non renseigné</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sig" id="sigOk"
                                        value="SIG ok">
                                    <label class="form-check-label" for="sigOk">SIG OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sig" id="pasSIG"
                                        value="Non SIG">
                                    <label class="form-check-label" for="pasSIG">Non SIG</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="commentaires" class="form-label">Commentaires</label>
                            <textarea class="form-control" placeholder="Commentaires divers sur opération" id="commentaires" name="commentaires"></textarea>
                          </div>
                    </div>
                </div>

                {{-- Onglet Logements --}}
                <div class="tab-pane fade bg-info-subtle" id="logement" role="tabpanel">
                    <div class="row g-2">
                        <div class="col-6 mb-3">
                            <label for="nbLogements" class="form-label">Nombre logements total</label>
                            <input type="number" name="nombre_logements" id="nbLogements" class="form-control">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="nombre_lls" class="form-label">Nombre logements sociaux</label>
                            <input type="number" name="nombre_lls" id="nombre_lls" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_plai_agrement" class="form-label">Nb PLAI (agrément)</label>
                            <input type="number" name="nombre_plai_agrement" id="nombre_plai_agrement"
                                class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plai" class="form-label">Nb PLAI</label>
                            <input type="number" name="nombre_plai" id="nombre_plai" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plus_agrement" class="form-label">Nb PLUS (agrément)</label>
                            <input type="number" name="nombre_plus_agrement" id="nombre_plus_agrement"
                                class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_plus" class="form-label">Nb PLUS</label>
                            <input type="number" name="nombre_plus" id="nombre_plus" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulsplus" class="form-label">Nb ulsplus</label>
                            <input type="number" name="nombre_ulsplus" id="nombre_ulsplus" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulspls" class="form-label">Nb ULSPLS</label>
                            <input type="number" name="nombre_ulspls" id="nombre_ulspls" class="form-control">
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_pls_agrement" class="form-label">Nb PLS (agrément)</label>
                            <input type="number" name="nombre_pls_agrement" id="nombre_pls_agrement"
                                class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_pls" class="form-label">Nb PLS</label>
                            <input type="number" name="nombre_pls" id="nombre_pls" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_lli" class="form-label">Nb LLI</label>
                            <input type="number" name="nombre_lli" id="nombre_lli" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_ulli" class="form-label">Nb ULLI</label>
                            <input type="number" name="nombre_ulli" id="nombre_ulli" class="form-control">
                        </div>
                    </div>
                    <hr class="my-2">
                    <p class="lead text-center">Accession</p>
                    <hr class="my-2">
                    <div class="row g-2">
                        <div class="col mb-3">
                            <label for="nombre_psla_agrement" class="form-label">Nb PSLA (agrément)</label>
                            <input type="number" name="nombre_psla_agrement" id="nombre_psla_agrement"
                                class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_psla" class="form-label">Nb PSLA</label>
                            <input type="number" name="nombre_psla" id="nombre_psla" class="form-control">
                        </div>
                        <div class="col mb-3">
                            <label for="nombre_brs" class="form-label">Nb BRS</label>
                            <input type="number" name="nombre_brs" id="nombre_brs" class="form-control">
                        </div>
                    </div>
                </div>

                {{-- Onglet Garanties --}}
                <div class="tab-pane fade bg-success-subtle" id="garantie" role="tabpanel">
                    <div class="row g-2">
                        <div class="col mb-3">

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
    let popup;

    function openBailleurPopup(url) {
        popup = window.open(url, 'popup', 'width=600,height=600');
        let timer = setInterval(function () {
            if (popup.closed) {
                clearInterval(timer);
                location.reload(); // recharge la page quand la popup est fermée
            }
        }, 500);
    }
</script>