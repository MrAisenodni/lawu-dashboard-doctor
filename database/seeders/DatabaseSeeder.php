<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // Master Seeders
            Masters\ActionSeeder::class,
            Masters\AssuranceSeeder::class,
            Masters\HospitalSeeder::class,
            Masters\VisitMethodSeeder::class,

            // Setting Seeders
            Settings\MainMenuSeeder::class,
            Settings\MenuSeeder::class,
            Settings\AttributesSeeder::class,
        ]);
    }
}
