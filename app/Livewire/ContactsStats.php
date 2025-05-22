<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\ContactECFR;
use Illuminate\Support\Facades\DB;

class ContactsStats extends Component
{
    public $dateFrom;
    public $dateTo;
    public $commune;

    // Données retournées
    public $stats = [];

    public function mount()
    {
        //valeurs par défaut, du début de l'année à aujourd'hui
        $this->dateFrom = now()->startOfYear()->toDateString();
        $this->dateTo = now()->toDateString();
        $this->commune = null;    //toutes communes
        $this->loadStats();
    }

    public function updated($field)
    {
        // recharge stats dès qu'un filtre change
        $this->loadStats();
    }

    protected function loadStats()
    {
        $query = ContactECFR::query()
            ->select(
                'commune_contact',
                DB::raw('YEAR(date_contact) as annee'),
                DB::raw('MONTH(date_contact) as mois'),
                DB::raw('COUNT(*) as total')
            )
            ->whereBetween('date_contact', [$this->dateFrom, $this->dateTo]);

        if ($this->commune) {
            $query->where('commune_contact', $this->commune);
        }

        $this->stats = $query
            ->groupBy('commune_contact', 'annee', 'mois')
            ->orderBy('commune_contact')
            ->orderBy('annee')
            ->orderBy('mois')
            ->get()
            ->transform(function ($row) {
                $row->mois_libelle = Carbon::create(null, $row->mois)
                    ->locale('fr')
                    ->monthName;
                return $row;
            })
            ->toArray();
    }

    public function render()
    {
        // Liste des communes pour le filtre
        $communes = ContactECFR::distinct('commune_contact')
            ->pluck('commune_contact')
            ->sort()
            ->toArray();

        return view('livewire.contacts-stats', [
            'communes' => $communes,
        ]);
    }
}
