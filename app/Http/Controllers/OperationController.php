<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use App\Models\Operation;
use App\Models\GarantieEmprunt;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operations = Operation::all();
        return view('operations.index', compact('operations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bailleurs = Bailleur::all();
        return view('operations.create', compact('bailleurs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_operation' => 'required|string|max:255',
            'adresse_operation' => 'required|string',
            'commune_operation' => 'required|string|max:255',
            'reference_cadastre' => 'nullable|string|max:255',
            'vefa_mod' => 'string|max:100',
            'neuf_aa' => 'string|max:100',
            'annee_prog' => 'nullable|string|max:100',
            'promoteur' => 'nullable|string|max:255',
            'numero_pc' => 'nullable|string|max:255',
            'date_pc' => 'nullable|date',
            'pc' => 'nullable|file',
            'nombre_logements' => 'nullable|integer',
            'nombre_lls' => 'nullable|integer',
            'nombre_plai' => 'nullable|integer',
            'nombre_plai_agrement' => 'nullable|integer',
            'nombre_plus' => 'nullable|integer',
            'nombre_plus_agrement' => 'nullable|integer',
            'nombre_ulsplus' => 'nullable|integer',
            'nombre_ulspls' => 'nullable|integer',
            'nombre_pls' => 'nullable|integer',
            'nombre_pls_agrement' => 'nullable|integer',
            'nombre_psla' => 'nullable|integer',
            'nombre_psla_agrement' => 'nullable|integer',
            'nombre_brs' => 'nullable|integer',
            'nombre_lli' => 'nullable|integer',
            'nombre_ulli' => 'nullable|integer',
            'date_livraison' => 'nullable|string',
            'nombre_logements_livres' => 'nullable|integer',
            'RT' => 'nullable|string|max:255',
            'inventaire_sru' => 'string|max:255',
            'sig' => 'string|max:255',
            'commentaires' => 'nullable|string',
            'bailleur_id' => 'required|exists:bailleurs,id',
            'montant_total' => 'nullable|numeric',
            'montant_plai_construction' => 'nullable|numeric',
            'montant_plai_foncier' => 'nullable|numeric',
            'montant_pls_construction' => 'nullable|numeric',
            'montant_pls_foncier' => 'nullable|numeric',
            'montant_plus_construction' => 'nullable|numeric',
            'montant_plus_foncier' => 'nullable|numeric',
            'montant_phb2' => 'nullable|numeric',
            'montant_booster' => 'nullable|numeric',
            'date_deliberation' => 'nullable|date',
            'nombre_logements_reserves' => 'nullable|integer',
            'type_financement' => 'nullable|string|max:255',
            'numero_delib' => 'nullable|string|max:255',
            'bureau_conseil' => 'nullable|string|max:255',
            'date_bureau_conseil' => 'nullable|date',
        ]);

        // Créez l'opération
        $operation = Operation::create($validatedData);

        // Créez la garantie associée
        GarantieEmprunt::create([
            'operation_id' => $operation->id,
            'nom_operation' => $operation->nom_operation,
            'montant_total' => $request->montant_total,
            'montant_plai_construction' => $request->montant_plai_construction,
            'montant_plai_foncier' => $request->montant_plai_foncier,
            'montant_pls_construction' => $request->montant_pls_construction,
            'montant_pls_foncier' => $request->montant_pls_foncier,
            'montant_plus_construction' => $request->montant_plus_construction,
            'montant_plus_foncier' => $request->montant_plus_foncier,
            'montant_phb2' => $request->montant_phb2,
            'montant_booster' => $request->montant_booster,
            'date_deliberation' => $request->date_deliberation,
            'nombre_logements_reserves' => $request->nombre_logements_reserves,
            'type_financement' => $request->type_financement,
            'numero_delib' => $request->numero_delib,
            'bureau_conseil' => $request->bureau_conseil,
            'date_bureau_conseil' => $request->date_bureau_conseil,
        ]);

        // $garantie = GarantieEmprunt::create([
        //     'operation_id' => $operation->id,
        //     'nom_operation' => $operation->nom_operation,
        //     'montant_total' => $request->montant_total,
        //     // ...
        // ]);
        
        // dd($garantie);
        return redirect()->route('operations.index')->with('success', 'Opération créée avec succès.');
    }

    public function show(Operation $operation)
    {
        $operation->load('garantieEmprunt');
        return view('operations.show', compact('operation'));
    }

    public function edit(Operation $operation)
    {
        $operation->load('garantieEmprunt');
        $bailleurs = \App\Models\Bailleur::all();
        return view('operations.edit', compact('operation', 'bailleurs'));
    }

    public function update(Request $request, Operation $operation)
    {
        $validated = $request->validate([
            'nom_operation' => 'required|string|max:255',
            'adresse_operation' => 'required|string',
            'commune_operation' => 'required|string|max:255',
            'reference_cadastre' => 'nullable|string|max:255',
            'vefa_mod' => 'string|max:100',
            'neuf_aa' => 'string|max:100',
            'annee_prog' => 'nullable|string|max:100',
            'promoteur' => 'nullable|string|max:255',
            'numero_pc' => 'nullable|string|max:255',
            'date_pc' => 'nullable|date',
            'pc' => 'nullable|file',
            'nombre_logements' => 'nullable|integer',
            'nombre_lls' => 'nullable|integer',
            'nombre_plai' => 'nullable|integer',
            'nombre_plai_agrement' => 'nullable|integer',
            'nombre_plus' => 'nullable|integer',
            'nombre_plus_agrement' => 'nullable|integer',
            'nombre_ulsplus' => 'nullable|integer',
            'nombre_ulspls' => 'nullable|integer',
            'nombre_pls' => 'nullable|integer',
            'nombre_pls_agrement' => 'nullable|integer',
            'nombre_psla' => 'nullable|integer',
            'nombre_psla_agrement' => 'nullable|integer',
            'nombre_brs' => 'nullable|integer',
            'nombre_lli' => 'nullable|integer',
            'nombre_ulli' => 'nullable|integer',
            'date_livraison' => 'nullable|string',
            'nombre_logements_livres' => 'nullable|integer',
            'RT' => 'nullable|string|max:255',
            'inventaire_sru' => 'string|max:255',
            'sig' => 'string|max:255',
            'commentaires' => 'nullable|string',
            'bailleur_id' => 'required|exists:bailleurs,id',
        ]);

        $operation->update($validated);

        return redirect()->route('operations.index')->with('success', 'Opération mise à jour.');
    }

    public function destroy(Operation $operation)
    {
        $operation->delete();
        return redirect()->route('operations.index')->with('success', 'Opération supprimée.');
    }
}
