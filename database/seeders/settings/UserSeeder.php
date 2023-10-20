<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/User.csv';
        $this->tablename = 'stg_user';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'nik', 'full_name', 'gender_id', 'religion_id', 'email', 'role_id', 'group_menu_id', 'picture', 'picture_name'];
    }

    public function run()
    {
        parent::run();
    }
}
