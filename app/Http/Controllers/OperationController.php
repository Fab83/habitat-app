<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use App\Models\Operation;
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
            'pc' => 'nullable|file', //Add
            'nombre_logements' => 'nullable|integer',
            'nombre_lls' => 'nullable|integer',
            'nombre_plai' => 'nullable|integer',
            'nombre_plai_agrement' => 'nullable|integer', //Add
            'nombre_plus' => 'nullable|integer',
            'nombre_plus_agrement' => 'nullable|integer', //Add
            'nombre_ulsplus' => 'nullable|integer',
            'nombre_ulspls' => 'nullable|integer',
            'nombre_pls' => 'nullable|integer',
            'nombre_pls_agrement' => 'nullable|integer', //Add
            'nombre_psla' => 'nullable|integer',
            'nombre_psla_agrement' => 'nullable|integer', //Add
            'nombre_brs' => 'nullable|integer',
            'nombre_lli' => 'nullable|integer',
            'nombre_ulli' => 'nullable|integer',
            'date_livraison' => 'nullable|date',
            'nombre_logements_livres' => 'nullable|integer',
            'RT' => 'nullable|string|max:255',
            'inventaire_sru' => 'string|max:255',
            'sig' => 'string|max:255',
            'commentaires' => 'nullable|string',
            'bailleur_id' => 'required|exists:bailleurs,id',
        ]);

        Operation::create($validated);

        return redirect()->route('operations.index')->with('success', 'Opération créée avec succès.');
    }

    public function show(Operation $operation)
    {
        return view('operations.show', compact('operation'));
    }

    public function edit(Operation $operation)
    {
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
            'pc' => 'nullable|file', //Add
            'nombre_logements' => 'nullable|integer',
            'nombre_lls' => 'nullable|integer',
            'nombre_plai' => 'nullable|integer',
            'nombre_plai_agrement' => 'nullable|integer', //Add
            'nombre_plus' => 'nullable|integer',
            'nombre_plus_agrement' => 'nullable|integer', //Add
            'nombre_ulsplus' => 'nullable|integer',
            'nombre_ulspls' => 'nullable|integer',
            'nombre_pls' => 'nullable|integer',
            'nombre_pls_agrement' => 'nullable|integer', //Add
            'nombre_psla' => 'nullable|integer',
            'nombre_psla_agrement' => 'nullable|integer', //Add
            'nombre_brs' => 'nullable|integer',
            'nombre_lli' => 'nullable|integer',
            'nombre_ulli' => 'nullable|integer',
            'date_livraison' => 'nullable|date',
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
