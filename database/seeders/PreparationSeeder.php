<?php

namespace Database\Seeders;

use App\Models\Preparation;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PreparationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Preparation::create([
            'voiture_id' => 1,
            'agency_id' => 1,
            'type' => 'Nettoyage',
            'date_debut' => now(),
            'date_fin' => now()->addDay(),
            'commentaire' => 'Préparation avant livraison',
        ]);
    }
}
