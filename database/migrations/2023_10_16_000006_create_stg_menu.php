<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgMenu extends Migration
{
    public function up()
    {
        Schema::create('stg_menu', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->boolean('is_parent')->default(0);
            $table->boolean('is_login')->default(0);
            $table->boolean('is_shown')->default(1);
            $table->integer('order_no')->nullable();

            // Foreign Key
            $table->unsignedInteger('main_menu_id')->nullable();
            
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
        Schema::dropIfExists('stg_menu');
    }
}
