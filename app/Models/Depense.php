<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depense extends Model
{
    protected $fillable = ['agency_id', 'type', 'montant', 'date', 'commentaire'];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}
