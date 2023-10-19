<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class GroupMenuSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/GroupMenu.csv';
        $this->tablename = 'stg_group_menu';
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
