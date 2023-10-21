<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class MenuAccessSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/MenuAccess.csv';
        $this->tablename = 'stg_menu_access';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['group_menu_id', 'main_menu_id', 'menu_id', 'submenu_id', 'view', 'add', 'edit', 'delete', 'detail', 'approval'];
    }

    public function run()
    {
        parent::run();
    }
}
