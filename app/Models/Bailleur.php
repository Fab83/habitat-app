<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bailleur extends Model
{
    protected $fillable = [
        'nom',
        'commune_bailleur',
        'convention_cadre',
        'nom_fichier_original'
    ];
    
    public function operations()
    {
        return $this->hasMany(Operation::class);
    } 
}
