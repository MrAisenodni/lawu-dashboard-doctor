<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstDoctor extends Migration
{
    public function up()
    {
        Schema::create('mst_doctor', function (Blueprint $table) {
            $table->id();

            // Data Pribadi Dokter
            $table->string('doctor_no')->nullable();
            $table->string('nik')->nullable();
            $table->string('full_name');
            $table->string('inisial_name')->nullable();
            $table->string('alias_name')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->unsignedInteger('gender_id')->nullable(); // Join ke Tabel mst_gender
            $table->unsignedInteger('religion_id')->nullable(); // Join ke Tabel mst_religion

            // Alamat Dokter
            $table->text('address_1')->nullable();
            $table->unsignedInteger('district_id')->nullable(); // Join ke Tabel mst_district
            $table->string('ward')->nullable();
            $table->string('post_code')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('home_number')->nullable();
                    
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
        Schema::dropIfExists('mst_doctor');
    }
}
