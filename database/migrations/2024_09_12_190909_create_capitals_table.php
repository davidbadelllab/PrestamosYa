<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('capitals', function (Blueprint $table) {
            $table->id();
            $table->decimal('capital_inicial', 12, 2)->default(0);
            $table->decimal('aumento_capital', 12, 2)->default(0);
            $table->decimal('ganancias_totales', 12, 2)->default(0);
            $table->timestamp('ultima_actualizacion')->nullable();
            $table->timestamps();
        });

        // Insertar el registro inicial
        DB::table('capitals')->insert([
            'capital_inicial' => 0,
            'aumento_capital' => 0,
            'ganancias_totales' => 0,
            'ultima_actualizacion' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('capitals');
    }
};
