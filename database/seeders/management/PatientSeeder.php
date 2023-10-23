<?php

namespace Database\Seeders\Management;

use App\Models\Management\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::factory()->count(1000)->create();
    }
}
