<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class WardSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Ward.csv';
        $this->tablename = 'mst_ward';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'post_code', 'name', 'district_id'];
    }

    public function run()
    {
        parent::run();
    }
}
