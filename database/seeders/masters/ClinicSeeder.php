<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ClinicSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Clinic.csv';
        $this->tablename = 'mst_clinic';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'name'];
    }

    public function run()
    {
        parent::run();
    }
}
