<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deudor_id')->constrained('deudores')->onDelete('cascade');
            $table->foreignId('aval_id')->nullable()->constrained('avales')->onDelete('set null');
            $table->decimal('monto_prestamo', 10, 2);
            $table->decimal('monto_abonado', 10, 2)->default(0);
            $table->decimal('interes_semanal', 5, 2)->default(15.00);
            $table->date('fecha_inicio');
            $table->date('fecha_final');
            $table->enum('estado_deuda', ['pendiente', 'pagado', 'mora'])->default('pendiente');
            $table->enum('metodo_prestamo', ['efectivo', 'transferencia']);
            $table->string('numero_transaccion')->nullable();
            $table->string('foto_rut_delante')->nullable();
            $table->string('foto_rut_detras')->nullable();
            $table->text('observaciones')->nullable();
            $table->timestamps();
            
            // Índices para mejorar el rendimiento de las consultas
            $table->index('estado_deuda');
            $table->index('fecha_final');
            $table->index(['estado_deuda', 'fecha_final']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestamos');
    }
};
