<?php

namespace App\Models;

use App\Models\Agency;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
        use HasApiTokens;
    protected $fillable = [
        'agency_id', 'nom', 'prenom', 'cin', 'salaire', 'email', 'password'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }
}

