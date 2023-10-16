<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgLogin extends Migration
{
    public function up()
    {
        Schema::create('stg_login', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();

            // Foreign Key
            $table->unsignedBigInteger('user_id')->nullable(); // Join ke tabel mst_user
            
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
        Schema::dropIfExists('stg_login');
    }
}
