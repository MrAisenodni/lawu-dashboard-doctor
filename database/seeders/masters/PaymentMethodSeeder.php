<?php

namespace Database\Seeders\Masters;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class PaymentMethodSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->file = '/database/csv/masters/PaymentMethod.csv';
        $this->tablename = 'mst_payment_method';
        $this->defaults = [
            'created_by'    => 'Migrasi',
            'created_at'    => now(),
        ];
        $this->mapping = ['id', 'name'];
    }

    public function run()
    {
        parent::run();
    }
}
