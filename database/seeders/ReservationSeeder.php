<?php

namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        Reservation::create([
            'client_id' => 1,
            'voiture_id' => 1,
            'agency_id' => 1,
            'date_debut' => '2024-01-01',
            'date_fin' => '2024-01-05',
            'img_etat' => null,
            'prix' => 350,
            'contrat' => null,
            'status' => 'Confirmée',
            'prix_total' => 1400,
        ]);
    }
}
