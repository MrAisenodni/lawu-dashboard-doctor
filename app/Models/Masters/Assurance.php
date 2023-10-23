<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assurance extends Model
{
    use HasFactory;

    protected $table = 'mst_assurance';

    public function getPatient($hospital_id, $id)
    {
        return DB::table('mgm_patient')->where('disabled', 0)->where('hospital_id', $hospital_id)->where('assurance_id', $id)->count();
    }
}
