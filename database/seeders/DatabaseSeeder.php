<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\AgencySeeder;
use Database\Seeders\ClientSeeder;
use Database\Seeders\DepenseSeeder;
use Database\Seeders\SupportSeeder;
use Database\Seeders\VoitureSeeder;
use Database\Seeders\BlacklistSeeder;
use Database\Seeders\PreparationSeeder;
use Database\Seeders\ReservationSeeder;
use Database\Seeders\ReservationFinSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run()
    {
        $this->call([
            AgencySeeder::class,
            AdminSeeder::class,
            SupportSeeder::class,
            ClientSeeder::class,
            BlacklistSeeder::class,
            VoitureSeeder::class,
            DepenseSeeder::class,
            ReservationSeeder::class,
            ReservationFinSeeder::class,
            PreparationSeeder::class,
        ]);
    }
}
