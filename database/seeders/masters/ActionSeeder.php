<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class ActionSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/Action.csv';
        $this->tablename = 'mst_action';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['code', 'name', 'background', 'color', 'disabled'];
    }

    public function run()
    {
        parent::run();
    }
}
