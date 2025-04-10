<?php

namespace App\Http\Controllers;

use App\Models\Bailleur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BailleurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bailleurs = Bailleur::all();
        return view("bailleurs.index", compact("bailleurs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("bailleurs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'commune_bailleur' => 'required|string|max:255',
            'convention_cadre' => 'nullable|file|max:4096', // max 2 Mo
        ]);

        if ($request->hasFile('convention_cadre')) {
            $file = $request->file('convention_cadre');
    
            if (!$file->isValid()) {
                return back()->withErrors(['convention_cadre' => 'Fichier non valide']);
            }
    
            // Crée le dossier conventions/ s'il n'existe pas
            Storage::disk('public')->makeDirectory('conventions');
    
            $path = $file->store('conventions', 'public');
    
            $validated['convention_cadre'] = $path;
            $validated['nom_fichier_original'] = $file->getClientOriginalName();
        }

        Bailleur::create($validated);

        return redirect()->route('bailleurs.index')->with('success', 'Bailleur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bailleur $bailleur)
    {
        return view('bailleurs.show', compact('bailleur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bailleur $bailleur)
    {
        return view('bailleurs.edit', compact('bailleur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bailleur $bailleur)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'commune_bailleur' => 'required|string|max:255',
            'convention_cadre' => 'nullable|file|max:4096',
        ]);
        $bailleur->update($validated);
        return redirect()->route('bailleurs.index')->with('success', 'Bailleur updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bailleur $bailleur)
    {
        $bailleur->delete();
        return redirect()->route('bailleurs.index')->with('success', 'Bailleur deleted successfully.');
    }
}