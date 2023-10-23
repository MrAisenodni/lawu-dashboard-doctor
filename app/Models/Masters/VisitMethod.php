<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class VisitMethod extends Model
{
    use HasFactory;

    protected $table = 'mst_visit_method';

    public function getPatient($hospital_id, $id)
    {
        return DB::table('mgm_patient')->where('disabled', 0)->where('hospital_id', $hospital_id)->where('visit_method_id', $id)->count();
    }
}
