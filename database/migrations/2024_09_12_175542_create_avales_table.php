<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvalesTable extends Migration
{
    public function up()
    {
        Schema::create('avales', function (Blueprint $table) {
            $table->id();
            $table->string('rut')->unique();
            $table->string('nombre_completo');
            $table->string('direccion_hogar');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('avales');
    }
}

