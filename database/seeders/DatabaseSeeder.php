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
            Masters\BloodTypeSeeder::class,
            Masters\CitizenSeeder::class,
            Masters\CitySeeder::class,
            Masters\ClinicSeeder::class,
            Masters\CountrySeeder::class,
            Masters\EducationSeeder::class,
            Masters\DistrictSeeder::class,
            Masters\GenderSeeder::class,
            Masters\HospitalSeeder::class,
            Masters\MaritalStatusSeeder::class,
            Masters\OccupationSeeder::class,
            Masters\PaymentMethodSeeder::class,
            Masters\ProvinceSeeder::class,
            Masters\ReligionSeeder::class,
            Masters\UnitSeeder::class,
            Masters\VisitMethodSeeder::class,
            Masters\VisitTimeSeeder::class,
            // Masters\WardSeeder::class,

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

            // Management Seeder
            Management\PatientSeeder::class,
        ]);
    }
}
