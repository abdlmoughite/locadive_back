<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        Client::create([
            'agency_id' => 1,
            'nom' => 'John',
            'prenom' => 'Doe',
            'cin' => 'AB123456',
            'permis' => 'PER123456',
            'img_cin' => null,
            'img_permis' => null,
            'tele' => '0650000000',
            'scoring'=>15,
            'face2_prime'=>null,
            'face2_cin'=>null,
            'comment_scoring'=>'kadab o kijri ',
        ]);
    }
}
