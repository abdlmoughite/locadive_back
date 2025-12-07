<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationFin extends Model
{
    protected $fillable = [
        'reservation_id', 'dommages', 'km_fin', 'km_total', 'status_payee'
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
