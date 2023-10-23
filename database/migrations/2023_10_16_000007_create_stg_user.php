<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgUser extends Migration
{
    public function up()
    {
        Schema::create('stg_user', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique();
            $table->string('full_name');
            $table->unsignedInteger('gender_id')->nullable(); 
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->default(now())->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->string('home_number')->unique()->nullable();
            $table->text('address_1')->nullable();
            $table->string('address_2', 3)->nullable();
            $table->string('address_3', 3)->nullable();
            $table->unsignedInteger('religion_id')->nullable();     // Join ke Tabel mst_religion
            $table->unsignedInteger('role_id')->nullable();         // Join ke Tabel stg_role
            $table->unsignedInteger('group_menu_id')->nullable();         // Join ke Tabel stg_group_menu

            // Photo Profile
            $table->text('picture')->nullable();
            $table->string('picture_name')->nullable();
            
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
        Schema::dropIfExists('stg_user');
    }
}
