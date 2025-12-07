<?php

namespace Database\Seeders;

use App\Models\Voiture;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VoitureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
    {
        Voiture::create([
            'agency_id' => 1,
            'model' => 'Dacia Duster',
            'annee' => 2022,
            'etat' => 'Bonne',
            'matricule' => '12345-A-6',
            'color' => 'Blanc',
            'description' => 'SUV confortable',
            'options' => 'AC, GPS',
            'prix_jour' => 350,
            'assurance' => 'Assurance Full',
            'carte_grise' => 'cartegrise.png',
            'img' => 'voiture.png',
            'status' => 'Disponible',
            'km_debut' => 15000,
        ]);
    }
}
