<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactECFR extends Model
{
    protected $table = 'contact_ecfr';
    use HasFactory;
    protected $fillable = [
        'nom_contact',
        'prenom_contact',
        'date_contact',
        'email_contact',
        'telephone_contact',
        'adresse_contact',
        'commune_contact',
        'revenu_fiscal',
        'taille_menage',
        'demande',
        'reponse',
        'code_postal_contact',
        'commentaires_contact',
        'renvoi_citemetrie',
        'pieces_jointes'
    ];
}
