<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgRole extends Migration
{
    public function up()
    {
        Schema::create('stg_role', function (Blueprint $table) {
            $table->id();
            $table->string('name');

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
        Schema::dropIfExists('stg_role');
    }
}