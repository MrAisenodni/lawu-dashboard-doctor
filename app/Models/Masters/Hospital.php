<?php

namespace App\Models\Masters;

use App\Models\Management\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = 'mst_hospital';

    public function patients()
    {
        return $this->hasMany(Patient::class, 'hospital_id', 'id')->where('disabled', 0);
    }
    // Count with Filter
    public function getCount($id, $search = null)
    {
        $sql = $this->selectRaw('mgm_patient.id')
            ->join('mgm_patient', 'mgm_patient.hospital_id', '=', 'mst_hospital.id');

        if ($search) {
            return $sql->whereRaw("mgm_patient.disabled = 0 AND mst_hospital.disabled = 0 AND mst_hospital.id = '". $id ."' AND 
                    YEAR(mgm_patient.registration_date) = LEFT('". $search ."', 4) AND MONTH(mgm_patient.registration_date) = 
                    RIGHT('". $search ."', 2)"
                )->count();
        } else {
            return $sql->whereRaw("mgm_patient.disabled = 0 AND mst_hospital.disabled = 0 AND mst_hospital.id = '". $id ."'")->count();
        }
    }

    // Count Patient
    public function count_patient()
    {
        return $this->hasMany(Patient::class, 'hospital_id', 'id')->where('disabled', 0)->count();
    }
}
