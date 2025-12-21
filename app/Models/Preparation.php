<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preparation extends Model
{
    protected $fillable = [
        'voiture_id', 'type', 'date_debut', 'date_fin', 'commentaire', 'agency_id'
        , 'prix', 'facture'
        
    ];

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }
    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
