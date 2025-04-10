<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class ApiDataController extends Controller
{
    public function show()
    {
        $baseUrl = 'https://public.opendatasoft.com/api/explore/v2.1/catalog/datasets/buildingref-france-majic-parcelles-millesime/records';
    
        // Construction manuelle de l’URL avec les bons filtres
        $query = http_build_query([
            'limit' => 20,
        ]);
    
        // Ajout manuel des filtres refine
        $refines = [
            'dep_code:"83"',
            'com_arm_name:"SAINT RAPHAEL"',
            'label_code_droit:"Propriétaire"',
            'year:"2021"',
            'groupe_proprietaire:"Commune"',
            'nature_culture:"Terrains à bâtir"',
        ];
    
        // Encodage correct des filtres
        foreach ($refines as $refine) {
            $query .= '&refine=' . urlencode($refine);
        }
    
        $url = "$baseUrl?$query";
    
        $response = Http::get($url);
    
        if ($response->successful()) {
            $data = $response->json();
            $records = $data['results'] ?? [];
        } else {
            $records = [];
        }
    
        return view('parcelles.index', compact('records'));
    }
}
