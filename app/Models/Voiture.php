<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voiture extends Model
{
    protected $fillable = [
        'agency_id', 'model', 'annee', 'etat', 'matricule',
        'color', 'description', 'options', 'prix_jour',
        'assurance', 'carte_grise', 'img', 'status', 'km_debut',
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function preparations()
    {
        return $this->hasMany(Preparation::class);
    }
}

