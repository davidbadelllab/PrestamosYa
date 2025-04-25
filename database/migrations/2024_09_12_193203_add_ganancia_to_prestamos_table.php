<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGananciaToPrestamosTable extends Migration
{
    public function up()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->decimal('ganancia', 10, 2)->nullable()->after('monto_prestamo'); // Ajusta el lugar después del campo correcto
        });
    }

    public function down()
    {
        Schema::table('prestamos', function (Blueprint $table) {
            $table->dropColumn('ganancia');
        });
    }
}
