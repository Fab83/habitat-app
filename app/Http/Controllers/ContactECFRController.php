<?php

namespace App\Http\Controllers;

use App\Models\ContactECFR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactECFRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = ContactECFR::all();
        return view("contacts.index", compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("contacts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_contact' => 'required|string|max:255',
            'prenom_contact' => 'nullable|string|max:255',
            'date_contact' => 'required|date',
            'email_contact' => 'required|email|max:255',
            'telephone_contact' => 'required|string|max:20',
            'adresse_contact' => 'required|string|max:255',
            'commune_contact' => 'required|string|max:255',
            'revenu_fiscal' => 'nullable|numeric',
            'taille_menage' => 'nullable|integer',
            'demande' => 'nullable|string|max:255',
            'reponse' => 'nullable|string|max:255',
            'code_postal_contact' => 'nullable|string|max:10',
            'commentaires_contact' => 'nullable|string|max:500',
            'renvoi_citemetrie' => 'nullable|boolean',
            // Assuming pieces_jointes is a file upload
            // Add validation for pieces_jointes if needed
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $file = $request->file('pieces_jointes');

            if (!$file->isValid()) {
                return back()->withErrors(['pieces_jointes' => 'Fichier non valide']);
            }

            // Crée le dossier pieces_jointes/ s'il n'existe pas
            Storage::disk('public')->makeDirectory('pieces_jointes');

            $path = $file->store('pieces_jointes', 'public');

            $validated['pieces_jointes'] = $path;
        }

        ContactECFR::create($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactECFR $contactECFR)
    {
        return view('contacts.show', compact('contactECFR'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactECFR $contactECFR)
    {
        return view('contacts.edit', compact('contactECFR'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactECFR $contactECFR)
    {
        $validated = $request->validate([
            'nom_contact' => 'required|string|max:255',
            'prenom_contact' => 'nullable|string|max:255',
            'date_contact' => 'required|date',
            'email_contact' => 'required|email|max:255',
            'telephone_contact' => 'required|string|max:20',
            'adresse_contact' => 'required|string|max:255',
            'commune_contact' => 'required|string|max:255',
            'revenu_fiscal' => 'nullable|numeric',
            'taille_menage' => 'nullable|integer',
            'demande' => 'nullable|string|max:255',
            'reponse' => 'nullable|string|max:255',
            'code_postal_contact' => 'nullable|string|max:10',
            'commentaires_contact' => 'nullable|string|max:500',
            'renvoi_citemetrie' => 'nullable|boolean',
            // Assuming pieces_jointes is a file upload
        ]);

        if ($request->hasFile('pieces_jointes')) {
            $file = $request->file('pieces_jointes');

            if (!$file->isValid()) {
                return back()->withErrors(['pieces_jointes' => 'Fichier non valide']);
            }

            // Crée le dossier pieces_jointes/ s'il n'existe pas
            Storage::disk('public')->makeDirectory('pieces_jointes');

            $path = $file->store('pieces_jointes', 'public');

            $validated['pieces_jointes'] = $path;
        }

        $contactECFR->update($validated);

        return redirect()->route('contacts.index')->with('success', 'Contact mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactECFR $contactECFR)
    {
        $contactECFR->delete();
        return redirect()->route('contacts.index')->with('success', 'Contact supprimé avec succès.');
    }
}
