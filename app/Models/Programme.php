<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = ['nom', 'description', 'bailleur_id'];
    
    public function operations()
    {
        return $this->hasMany(Operation::class);
    }
}
