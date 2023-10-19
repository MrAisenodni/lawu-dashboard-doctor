<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class RoleSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/Role.csv';
        $this->tablename = 'stg_role';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['name'];
    }

    public function run()
    {
        parent::run();
    }
}
