<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class MenuSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/Menu.csv';
        $this->tablename = 'stg_menu';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'title', 'icon', 'url', 'is_parent', 'is_login', 'is_shown', 'main_menu_id', 'order_no'];
    }

    public function run()
    {
        parent::run();
    }
}
