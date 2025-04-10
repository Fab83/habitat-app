<?php

namespace App\Http\Controllers;

use App\Models\GarantieEmprunt;
use Illuminate\Http\Request;

class GarantieEmpruntController extends Controller
{
    public function index()
    {
        return GarantieEmprunt::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_operation' => 'required|exists:operations,nom_operation',
            'montant' => 'required|numeric',
            'date_emprunt' => 'required|date',
            'taux_interet' => 'required|numeric',
        ]);

        return GarantieEmprunt::create($validated);
    }

    public function show(GarantieEmprunt $garantieEmprunt)
    {
        return $garantieEmprunt;
    }

    public function update(Request $request, GarantieEmprunt $garantieEmprunt)
    {
        $validated = $request->validate([
            'montant' => 'numeric',
            'date_emprunt' => 'date',
            'taux_interet' => 'numeric',
        ]);

        $garantieEmprunt->update($validated);

        return $garantieEmprunt;
    }

    public function destroy(GarantieEmprunt $garantieEmprunt)
    {
        $garantieEmprunt->delete();

        return response()->noContent();
    }
}
