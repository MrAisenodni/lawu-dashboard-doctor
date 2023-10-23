<?php

namespace App\Models\Management;

use App\Models\Masters\{
    Action, Assurance, BloodType, Citizen, City, Clinic, Country, District, Doctor,
    Education, Gender, Hospital, MaritalStatus, Occupation, PaymentMethod, Province,
    Religion, Unit, VisitMethod, VisitTime, Ward,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'mgm_patient';

    // Foreign Key to Master Table
    public function action()
    {
        return $this->belongsTo(Action::class, 'action_id', 'id')->select('id', 'code', 'name', 'background', 'color')->where('disabled', 0);
    }
    public function assurance()
    {
        return $this->belongsTo(Assurance::class, 'assurance_id', 'id')->select('id', 'code', 'name', 'background', 'color')->where('disabled', 0);
    }
    public function blood_type()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function citizen()
    {
        return $this->belongsTo(Citizen::class, 'citizen_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'clinic_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id')->select('id', 'name', 'city_id')->where('disabled', 0);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id')->select('id', 'code', 'name', 'background', 'color')->where('disabled', 0);
    }
    public function marital_status()
    {
        return $this->belongsTo(MaritalStatus::class, 'marital_status_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function payment_method()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function religion()
    {
        return $this->belongsTo(Religion::class, 'religion_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
    public function visit_method()
    {
        return $this->belongsTo(VisitMethod::class, 'visit_method_id', 'id')->select('id', 'code', 'name', 'background', 'color')->where('disabled', 0);
    }
    public function visit_time()
    {
        return $this->belongsTo(VisitTime::class, 'visit_time_id', 'id')->select('id', 'name')->where('disabled', 0);
    }
}
