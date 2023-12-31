<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class CountrySeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Country.csv';
        $this->tablename = 'mst_country';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'code', 'name'];
    }

    public function run()
    {
        parent::run();
    }
}
