<?php

namespace Database\Seeders;

use App\Models\Depense;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        Depense::create([
            'agency_id' => 1,
            'type' => 'Nettoyage',
            'montant' => 150,
            'date' => now(),
            'commentaire' => 'Nettoyage voiture',
        ]);
    }
}
