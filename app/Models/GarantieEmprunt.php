<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarantieEmprunt extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'nom_operation', // Clé étrangère
        'operation_id',
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
    ];

    public function operation()
    {
        return $this->belongsTo(Operation::class); // Utilise la clé étrangère par défaut : operation_id
    }
}