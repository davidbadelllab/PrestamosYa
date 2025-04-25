<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeudoresTable extends Migration
{
    public function up()
    {
        Schema::create('deudores', function (Blueprint $table) {
            $table->id();
            $table->string('rut')->unique();
            $table->string('nombre_completo');
            $table->string('direccion_hogar');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->string('nombre_empresa');
            $table->string('direccion_negocio');
            $table->decimal('sueldo_mensual', 10, 2);
            $table->string('foto_rut_delante')->nullable();
            $table->string('foto_rut_detras')->nullable();
            $table->boolean('deuda_activa')->default(false);
            $table->foreignId('aval_id')->nullable()->constrained('avales')->onDelete('set null'); // Relación con aval
            $table->string('garantia')->nullable(); // Campo de garantía opcional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deudores');
    }
}
