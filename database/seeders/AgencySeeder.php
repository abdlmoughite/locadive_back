<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        Agency::create([
            'nom' => 'LocaDrive Agency',
            'adresse' => 'Casablanca, Morocco',
            'tele' => '0600000000',
            'email' => 'agency@agency.com',
            'password' => bcrypt('agency123'),
        ]);
        Agency::create([
            'nom' => 'koala',
            'adresse' => 'Casablanca, Morocco',
            'tele' => '0600000000',
            'email' => 'agency2@agency.com',
            'password' => bcrypt('agency123'),
        ]);
    }
}
