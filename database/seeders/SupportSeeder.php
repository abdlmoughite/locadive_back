<?php

namespace Database\Seeders;

use App\Models\Support;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run()
    {
        Support::create([
            'agency_id' => 1,
            'nom' => 'Support',
            'prenom' => 'User',
            'cin' => 'X123456',
            'salaire' => 4000,
            'email' => 'support@locadrive.com',
            'password' => bcrypt('password'),
        ]);
    }
}
