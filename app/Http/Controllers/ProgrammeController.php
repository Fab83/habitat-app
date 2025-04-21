<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use App\Models\Bailleur;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('operations')->get(); // chargement eager des opérations
        return view('programmes.index', compact('programmes'));
    }

    public function create()
    {
        $bailleurs = \App\Models\Bailleur::all();
        return view('programmes.create', compact('bailleurs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_programme' => 'required|string',
            'bailleur_id' => 'required|exists:bailleurs,id',
        ]);

        Programme::create($validated);

        return redirect()->route('programmes.index')->with('success', 'Programme créé avec succès.');
    }

    public function show(Programme $programme)
    {
        $programme->load('operations'); // charge les opérations associées
        return view('programmes.show', compact('programme'));
    }

    public function edit(Programme $programme)
    {
        $bailleurs = Bailleur::all();
        return view('programmes.edit', compact('programme', 'bailleurs'));
    }

    public function update(Request $request, Programme $programme)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_programme' => 'required|string',
        ]);

        $programme->update($validated);

        return redirect()->route('programmes.index')->with('success', 'Programme mis à jour.');
    }

    public function destroy(Programme $programme)
    {
        $programme->delete();
        return redirect()->route('programmes.index')->with('success', 'Programme supprimé.');
    }
}
