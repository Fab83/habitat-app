<?php

namespace App\Models;

use App\Models\Programme;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_operation',
        'programme_id',
        'bailleur_id',
        'adresse_operation',
        'commune_operation',
        'annulation',
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
        'commentaires',
        'garantie_emprunt' // Add this to allow nested form data
    ];

    public function bailleur()
    {
        return $this->belongsTo(Bailleur::class);
    }
    public function garantieEmprunt()
    {
        return $this->hasOne(GarantieEmprunt::class);
    }
    public function programme()
{
    return $this->belongsTo(Programme::class);
}

    // Add this method to handle nested garantie_emprunt data
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($operation) {
            if (request()->has('garantie_emprunt')) {
                $operation->garantieEmprunt()->updateOrCreate(
                    ['operation_id' => $operation->id],
                    request()->get('garantie_emprunt')
                );
            }
        });
    }
}
