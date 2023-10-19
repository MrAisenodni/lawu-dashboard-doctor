<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class VisitMethodSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/VisitMethod.csv';
        $this->tablename = 'mst_visit_method';
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
