<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class MainMenuSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/MainMenu.csv';
        $this->tablename = 'stg_main_menu';
        $this->defaults = [
            'created_by'    => 'Migrasi'
        ];
        $this->mapping = ['id', 'title', 'icon', 'url', 'is_parent', 'is_login', 'order_no', 'is_shown'];
    }

    public function run()
    {
        parent::run();
    }
}
