<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAccess extends Model
{
    use HasFactory;

    protected $table = 'stg_data_access';
}
