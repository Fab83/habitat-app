<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class InseeController extends Controller
{
    public function show()
    {
        $url = "https://apis.insee.fr/melodi/data/DS_TOUR_FREQ?totalCount=true&maxResult=100&idTerritoire=true";

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer YOUR_API_KEY', // Remplacez par votre clé API
            ])->get($url);

            if ($response->successful()) {
                $data = $response->json();
                $observations = $data['observations'] ?? [];
                return view('parcelles.insee', compact('observations'));
            } else {
                return view('parcelles.insee', ['observations' => []]);
            }
        } catch (\Exception $e) {
            return view('parcelles.insee', ['observations' => []]);
        }
    }
}
?>