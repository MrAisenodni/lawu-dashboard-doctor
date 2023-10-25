<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DataAccessSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/Settings/DataAccess.csv';
        $this->tablename = 'stg_data_access';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'role_id', 'title', 'module_name', 'table_name', 'condition'];
    }

    public function run()
    {
        parent::run();
    }
}
