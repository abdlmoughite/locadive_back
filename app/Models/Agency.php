<?php

namespace App\Models;

use App\Models\Support;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
        use HasApiTokens;

    protected $fillable = [
        'nom', 'adresse', 'tele', 'email', 'password'
    ];

    // Une agence possède plusieurs supports
    public function supports()
    {
        return $this->hasMany(Support::class);
    }

    // Une agence possède plusieurs clients
    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    // Une agence possède plusieurs voitures
    public function voitures()
    {
        return $this->hasMany(Voiture::class);
    }

    // Une agence possède plusieurs dépenses
    public function depenses()
    {
        return $this->hasMany(Depense::class);
    }
}

