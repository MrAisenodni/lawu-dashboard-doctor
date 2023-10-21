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
            Masters\GenderSeeder::class,
            Masters\HospitalSeeder::class,
            Masters\ReligionSeeder::class,
            Masters\VisitMethodSeeder::class,

            // Setting Seeders
            Settings\AttributesSeeder::class,
            Settings\GroupMenuSeeder::class,
            Settings\LoginSeeder::class,
            Settings\MainMenuSeeder::class,
            Settings\MenuSeeder::class,
            Settings\MenuAccessSeeder::class,
            Settings\RoleSeeder::class,
            Settings\ProviderSeeder::class,
            Settings\UserSeeder::class,
        ]);
    }
}
