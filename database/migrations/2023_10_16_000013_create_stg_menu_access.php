<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStgMenuAccess extends Migration
{
    public function up()
    {
        Schema::create('stg_menu_access', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger('group_menu_id'); // Join ke Tabel stg_group_menu
            $table->unsignedInteger('main_menu_id')->nullable(); // Join ke Tabel stg_main_menu
            $table->unsignedInteger('menu_id')->nullable(); // Join ke Tabel stg_menu
            $table->unsignedInteger('submenu_id')->nullable(); // Join ke Tabel stg_submenu
            
            $table->boolean('add')->default(0);
            $table->boolean('edit')->default(0);
            $table->boolean('delete')->default(0);
            $table->boolean('detail')->default(0);
            $table->boolean('view')->default(0);
            $table->boolean('approval')->default(0);
            
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
        Schema::dropIfExists('stg_menu_access');
    }
}
