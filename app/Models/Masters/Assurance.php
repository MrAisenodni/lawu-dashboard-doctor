<?php

namespace App\Models\Masters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Assurance extends Model
{
    use HasFactory;

    protected $table = 'mst_assurance';

    // Count with Filter
    public function getCount($id, $hospital_id, $search = null)
    {
        $sql = $this->selectRaw('mgm_patient.id')
            ->join('mgm_patient', 'mgm_patient.assurance_id', '=', 'mst_assurance.id');

        if ($search) {
            return $sql->whereRaw("mgm_patient.disabled = 0 AND mst_assurance.disabled = 0 AND mst_assurance.id = '". $id ."' AND 
                    mgm_patient.hospital_id = '". $hospital_id ."' AND YEAR(mgm_patient.registration_date) = LEFT('". $search ."', 4) 
                    AND MONTH(mgm_patient.registration_date) = RIGHT('". $search ."', 2)"
                )->count();
        } else {
            return $sql->whereRaw("mgm_patient.disabled = 0 AND mst_assurance.disabled = 0 AND mst_assurance.id = '". $id ."' AND 
                    mgm_patient.hospital_id = '". $hospital_id ."'"
                )->count();
        }
    }
}
