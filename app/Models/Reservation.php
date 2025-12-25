<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'client_id', 'voiture_id', 'date_debut', 'date_fin',
        'img_etat', 'prix', 'contrat', 'status', 'agency_id', 'prix_total',
        'scoring', 'comment_scoring'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function voiture()
    {
        return $this->belongsTo(Voiture::class);
    }

    public function reservationFin()
    {
        return $this->hasOne(ReservationFin::class);
    }
}
