<?php

namespace Database\Seeders;

use App\Models\Blacklist;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlacklistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Blacklist::create([
            'client_id' => 1,
            'score' => 0,
            'commentaire' => 'Client fiable',
        ]);
    }
}
