<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class VisitTimeSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/VisitTime.csv';
        $this->tablename = 'mst_visit_time';
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
