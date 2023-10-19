<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class AssuranceSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Assurance.csv';
        $this->tablename = 'mst_assurance';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['code', 'name', 'background', 'color'];
    }

    public function run()
    {
        parent::run();
    }
}
