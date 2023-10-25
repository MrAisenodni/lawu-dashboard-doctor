<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgDataAccess extends Migration
{
    public function up()
    {
        Schema::create('stg_data_access', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('role_id'); // Join ke Tabel stg_role
            $table->string('title', 100);
            $table->string('module_name', 100)->nullable();
            $table->string('table_name', 100)->nullable();
            $table->text('condition')->nullable();
                    
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
        Schema::dropIfExists('stg_data_access');
    }
}
