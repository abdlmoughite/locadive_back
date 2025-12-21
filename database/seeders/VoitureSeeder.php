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
        'description' => 'SUV confortable et économique',
        'options' => 'AC, GPS, Bluetooth',
        'prix_jour' => 350,
        'assurance' => 'Assurance Full',
        'carte_grise' => 'cartegrise_duster.png',
        'img' => 'duster.png',
        'status' => 'Disponible',
        'km_debut' => 15000,
    ]);

    Voiture::create([
        'agency_id' => 1,
        'model' => 'Hyundai i10',
        'annee' => 2021,
        'etat' => 'Bonne',
        'matricule' => '67890-B-7',
        'color' => 'Gris',
        'description' => 'Citadine idéale pour la ville',
        'options' => 'AC, Radio',
        'prix_jour' => 250,
        'assurance' => 'Assurance Standard',
        'carte_grise' => 'cartegrise_i10.png',
        'img' => 'i10.png',
        'status' => 'Reserve',
        'km_debut' => 32000,
    ]);

    Voiture::create([
        'agency_id' => 1,
        'model' => 'Peugeot 208',
        'annee' => 2020,
        'etat' => 'Moyenne',
        'matricule' => '44556-C-9',
        'color' => 'Rouge',
        'description' => 'Compacte moderne et fiable',
        'options' => 'AC, GPS',
        'prix_jour' => 280,
        'assurance' => 'Assurance Standard',
        'carte_grise' => 'cartegrise_208.png',
        'img' => '208.png',
        'status' => 'Pas disponible',
        'km_debut' => 54000,
    ]);

    Voiture::create([
        'agency_id' => 1,
        'model' => 'Toyota Corolla',
        'annee' => 2023,
        'etat' => 'Excellente',
        'matricule' => '88991-D-1',
        'color' => 'Noir',
        'description' => 'Berline fiable pour long trajet',
        'options' => 'AC, GPS, Caméra recul',
        'prix_jour' => 400,
        'assurance' => 'Assurance Full',
        'carte_grise' => 'cartegrise_corolla.png',
        'img' => 'corolla.png',
        'status' => 'Disponible',
        'km_debut' => 8000,
    ]);

    Voiture::create([
        'agency_id' => 1,
        'model' => 'Volkswagen Golf 7',
        'annee' => 2019,
        'etat' => 'Bonne',
        'matricule' => '77112-E-3',
        'color' => 'Bleu',
        'description' => 'Confort et performance',
        'options' => 'AC, GPS, Régulateur',
        'prix_jour' => 330,
        'assurance' => 'Assurance Standard',
        'carte_grise' => 'cartegrise_golf.png',
        'img' => 'golf7.png',
        'status' => 'Reserve',
        'km_debut' => 61000,
    ]);
    }
}
