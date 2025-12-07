<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'agency_id', 'nom', 'prenom',        'cin', 'permis',
        'img_cin', 'img_permis', 'tele'
    ];

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function blacklist()
    {
        return $this->hasOne(Blacklist::class);
    }
}
