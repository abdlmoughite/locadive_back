<?php

namespace Database\Seeders;

use App\Models\ReservationFin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationFinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ReservationFin::create([
            'reservation_id' => 1,
            'dommages' => 'Aucun',
            'km_fin' => 16000,
            'km_total' => 1000,
            'status_payee' => true,
        ]);
    }
}
