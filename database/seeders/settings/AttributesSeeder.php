<?php

namespace Database\Seeders\Settings;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class AttributesSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/settings/Attributes.csv';
        $this->tablename = 'stg_attributes';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = [
            'title', 'value'
        ];
    }

    public function run()
    {
        parent::run();
    }
}
