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

    // Count Patient
    public function count_patient()
    {
        return $this->hasMany(Patient::class, 'hospital_id', 'id')->where('disabled', 0)-> count();
    }
}
