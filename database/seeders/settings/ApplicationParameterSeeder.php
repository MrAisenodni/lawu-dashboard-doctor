<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ApplicationParameterSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Settings/ApplicationParameter.csv';
        $this->tablename = 'stg_application_parameter';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'title', 'value'];
    }

    public function run()
    {
        parent::run();
    }
}
