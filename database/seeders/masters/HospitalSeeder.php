<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class HospitalSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Hospital.csv';
        $this->tablename = 'mst_hospital';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['code', 'name', 'color'];
    }

    public function run()
    {
        parent::run();
    }
}
