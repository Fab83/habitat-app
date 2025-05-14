<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GarantieEmprunt;
use Illuminate\Support\Facades\Storage;

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
            'montant_total',
            'montant_plai_construction',
            'montant_plai_foncier',
            'montant_pls_construction',
            'montant_pls_foncier',
            'montant_plus_construction',
            'montant_plus_foncier',
            'montant_phb2',
            'montant_booster',
            'date_deliberation',
            'nombre_logements_reserves',
            'type_financement',
            'numero_delib',
            'bureau_conseil',
            'date_bureau_conseil',
            'deliberation' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validation du fichier

        ]);

        if ($request->hasFile('deliberation')) {
            $validated['deliberation'] = $request->file('deliberation')->store('deliberations', 'public');
        }

        return GarantieEmprunt::create($validated);
    }

    public function show(GarantieEmprunt $garantieEmprunt)
    {
        return $garantieEmprunt;
    }

    public function update(Request $request, GarantieEmprunt $garantieEmprunt)
    {
        $validated = $request->validate([
            'nom_operation', // Clé étrangère
            'montant_total',
            'montant_plai_construction',
            'montant_plai_foncier',
            'montant_pls_construction',
            'montant_pls_foncier',
            'montant_plus_construction',
            'montant_plus_foncier',
            'montant_phb2',
            'montant_booster',
            'date_deliberation',
            'nombre_logements_reserves',
            'type_financement',
            'numero_delib',
            'bureau_conseil',
            'date_bureau_conseil',
            'deliberation' => 'nullable|file|mimes:pdf,doc,docx|max:2048', // Validation du fichier
        ]);

        if ($request->hasFile('deliberation')) {
            // Supprimez l'ancien fichier si nécessaire
            if ($garantieEmprunt->deliberation) {
                Storage::disk('public')->delete($garantieEmprunt->deliberation);
            }

            $validated['deliberation'] = $request->file('deliberation')->store('deliberations', 'public');
        }

        $garantieEmprunt->update($validated);

        return $garantieEmprunt;
    }

    public function destroy(GarantieEmprunt $garantieEmprunt)
    {
        $garantieEmprunt->delete();

        return response()->noContent();
    }
}
