<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_operation',
        'bailleur_id',
        'adresse_operation',
        'commune_operation',
        'reference_cadastre',
        'vefa_mod',
        'neuf_aa',
        'annee_prog',
        'promoteur',
        'numero_pc',
        'date_pc',
        'pc',
        'nombre_logements',
        'nombre_lls',
        'nombre_plai',
        'nombre_plai_agrement',
        'nombre_plus',
        'nombre_plus_agrement',
        'nombre_ulsplus',
        'nombre_ulspls',
        'nombre_pls',
        'nombre_pls_agrement',
        'nombre_psla',
        'nombre_psla_agrement',
        'nombre_brs',
        'nombre_lli',
        'nombre_ulli',
        'date_livraison',
        'nombre_logements_livres',
        'RT',
        'inventaire_sru',
        'sig',
        'commentaires'
    ];

    public function bailleur()
    {
        return $this->belongsTo(Bailleur::class);
    }
    public function garantieEmprunt()
    {
        return $this->hasOne(GarantieEmprunt::class, 'nom_operation', 'nom_operation');
    }
}
