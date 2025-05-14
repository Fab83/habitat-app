<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiDataControllerDVF extends Controller
{
    public function show()
    {
        $baseUrl = 'https://public.opendatasoft.comhttps://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/buildingref-france-demande-de-valeurs-foncieres-geolocalisee-millesime/records';
    
        // Construction manuelle de l'URL avec les bons filtres
        $query = http_build_query([
            'limit' => 50,
        ]);
    
        // Ajout manuel des filtres refine
        // Liste des options pour com_arm_name
        $comDVFNames = [
            'Fréjus',
            'Saint-Raphaël',
            // 'ROQUEBRUNE-SUR-ARGENS',
            // 'PUGET-SUR-ARGENS',
            // 'LES ADRETS DE L ESTEREL',
        ];

        // Récupération de la valeur sélectionnée (par défaut "SAINT RAPHAEL")
        $selectedComDVFName = request('com_arm_name', 'SAINT RAPHAEL');

        $refines = [
            'dep_code:"83"',
            // Ajout du filtre sélectionné
            'com_name:"' . $selectedComDVFName . '"',
            'nature_mutation:"Vente"',
        ];
    
        foreach ($refines as $refine) {
            $query .= '&refine=' . urlencode($refine);
        }
    
        $url = "$baseUrl?$query";
    
        // Skip SSL verification
        $response = Http::withoutVerifying()->get($url);
    
        if ($response->successful()) {
            $data = $response->json();
            $records = $data['results'] ?? [];
        } else {
            $records = [];
        }
    
        return view('parcelles.dvf', compact('records', 'comDVFNames', 'selectedComDVFName'));
    }
}