<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMgmPatient extends Migration
{
    public function up()
    {
        Schema::create('mgm_patient', function (Blueprint $table) {
            $table->id();

            // Data Pasien
            $table->string('rm_no')->nullable();
            $table->string('registration_no')->nullable();
            $table->date('registration_date')->nullable();
            $table->string('doctor_reference')->nullable();
            $table->unsignedInteger('action_id')->nullable(); // Join ke Tabel mst_assurance
            $table->unsignedInteger('assurance_id')->nullable(); // Join ke Tabel mst_assurance
            $table->unsignedInteger('clinic_id')->nullable(); // Join ke Tabel mst_clinic
            $table->unsignedInteger('doctor_id')->nullable(); // Join ke Tabel mst_doctor
            $table->unsignedInteger('hospital_id')->nullable(); // Join ke Tabel mst_hospital
            $table->unsignedInteger('payment_method_id')->nullable(); // Join ke Tabel mst_payment_method
            $table->unsignedInteger('unit_id')->nullable(); // Join ke Tabel mst_unit
            $table->unsignedInteger('visit_method_id')->nullable(); // Join ke Tabel mst_visit_method
            $table->unsignedInteger('visit_time_id')->nullable(); // Join ke Tabel visit_time

            // Data Pribadi Pasien
            $table->string('nik')->nullable();
            $table->string('full_name');
            $table->string('inisial_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedInteger('gender_id')->nullable(); // Join ke Tabel mst_gender
            $table->unsignedInteger('religion_id')->nullable(); // Join ke Tabel mst_religion
            $table->unsignedInteger('blood_type_id')->nullable(); // Join ke Tabel mst_blood_type

            // Kontak Pasien
            $table->text('address_1')->nullable();
            $table->unsignedInteger('district_id')->nullable(); // Join ke Tabel mst_district
            $table->string('ward')->nullable();
            $table->string('post_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('home_number')->nullable();

            // Informasi Tambahan Pasien
            $table->string('allergy')->nullable();
            $table->unsignedInteger('education_id')->nullable(); // Join ke Tabel mst_education
            $table->unsignedInteger('marital_status_id')->nullable(); // Join ke Tabel mst_marital_status
            $table->unsignedInteger('citizen_id')->nullable(); // Join ke Tabel mst_citizen
            $table->unsignedInteger('occupation_id')->nullable(); // Join ke Tabel mst_occupation
                    
            // Struktur Baku
            $table->boolean('disabled')->default(0);
            $table->dateTime('created_at');
            $table->string('created_by');
            $table->dateTime('updated_at')->nullable();
            $table->string('updated_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('deleted_by')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mgm_patient');
    }
}
