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
            'adresse_operation'=>'required|string',
            'commune_operation'=>'required|string|max:255',
            'reference_cadastre'=>'string|max:255',
            'vefa_mod'=>'string|max:100',
            'neuf_aa'=>'string|max:100',
            'annee_prog'=>'string|max:100',
            'promoteur'=>'string|max:255',
            'numero_pc'=>'string|max:255',
            'date_pc'=>'date',
            'pc'=>'file', //Add
            'nombre_logements'=>'integer',
            'nombre_lls'=>'integer',
            'nombre_plai'=>'integer',
            'nombre_plai_agrement'=>'integer',//Add
            'nombre_plus'=>'integer',
            'nombre_plus_agrement'=>'integer',//Add
            'nombre_ulsplus'=>'integer',
            'nombre_ulspls'=>'integer',
            'nombre_pls'=>'integer',
            'nombre_pls_agrement'=>'integer', //Add
            'nombre_psla'=>'integer',
            'nombre_psla_agrement'=>'integer', //Add
            'nombre_brs'=>'integer',
            'nombre_lli'=>'integer',
            'nombre_ulli'=>'integer',
            'date_livraison'=>'date',
            'nombre_logements_livres'=>'integer',
            'RT'=>'string|max:255',
            'inventaire_sru'=>'string|max:255',
            'sig'=>'string|max:255',
            'commentaires'=>'string',
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
        return view('operations.edit', compact('operation'));
    }

    public function update(Request $request, Operation $operation)
    {
        $validated = $request->validate([
            'nom_operation' => 'required|string|max:255',
            'adresse_operation'=>'required|string',
            'commune_operation'=>'required|string|max:255',
            'reference_cadastre'=>'string|max:255',
            'vefa_mod'=>'string|max:100',
            'neuf_aa'=>'string|max:100',
            'annee_prog'=>'string|max:100',
            'promoteur'=>'string|max:255',
            'numero_pc'=>'string|max:255',
            'date_pc'=>'date',
            'pc'=>'file', //Add
            'nombre_logements'=>'integer',
            'nombre_lls'=>'integer',
            'nombre_plai'=>'integer',
            'nombre_plai_agrement'=>'integer',//Add
            'nombre_plus'=>'integer',
            'nombre_plus_agrement'=>'integer',//Add
            'nombre_ulsplus'=>'integer',
            'nombre_ulspls'=>'integer',
            'nombre_pls'=>'integer',
            'nombre_pls_agrement'=>'integer', //Add
            'nombre_psla'=>'integer',
            'nombre_psla_agrement'=>'integer', //Add
            'nombre_brs'=>'integer',
            'nombre_lli'=>'integer',
            'nombre_ulli'=>'integer',
            'date_livraison'=>'date',
            'nombre_logements_livres'=>'integer',
            'RT'=>'string|max:255',
            'inventaire_sru'=>'string|max:255',
            'sig'=>'string|max:255',
            'commentaires'=>'string',
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