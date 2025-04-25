<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use Carbon\Carbon;

class PrestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestamos = [
            [
                'deudor_id' => 1,
                'aval_id' => 1,
                'monto_prestamo' => 500000,
                'monto_abonado' => 200000,
                'interes_semanal' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(30),
                'fecha_final' => Carbon::now()->addDays(60),
                'estado_deuda' => 'pendiente',
                'metodo_prestamo' => 'transferencia',
                'numero_transaccion' => 'TR123456',
            ],
            [
                'deudor_id' => 2,
                'aval_id' => 2,
                'monto_prestamo' => 800000,
                'monto_abonado' => 800000,
                'interes_semanal' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(60),
                'fecha_final' => Carbon::now()->subDays(30),
                'estado_deuda' => 'pagado',
                'metodo_prestamo' => 'efectivo',
            ],
            [
                'deudor_id' => 3,
                'aval_id' => 3,
                'monto_prestamo' => 1000000,
                'monto_abonado' => 0,
                'interes_semanal' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(45),
                'fecha_final' => Carbon::now()->subDays(15),
                'estado_deuda' => 'mora',
                'metodo_prestamo' => 'transferencia',
                'numero_transaccion' => 'TR789012',
            ],
            [
                'deudor_id' => 4,
                'aval_id' => 4,
                'monto_prestamo' => 300000,
                'monto_abonado' => 150000,
                'interes_semanal' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(15),
                'fecha_final' => Carbon::now()->addDays(15),
                'estado_deuda' => 'pendiente',
                'metodo_prestamo' => 'efectivo',
            ],
            // Préstamo próximo a vencer
            [
                'deudor_id' => 1,
                'aval_id' => 1,
                'monto_prestamo' => 450000,
                'monto_abonado' => 0,
                'interes_semanal' => 15.00,
                'fecha_inicio' => Carbon::now()->subDays(23),
                'fecha_final' => Carbon::now()->addDays(5),
                'estado_deuda' => 'pendiente',
                'metodo_prestamo' => 'transferencia',
                'numero_transaccion' => 'TR345678',
            ],
        ];

        foreach ($prestamos as $prestamo) {
            Prestamo::create($prestamo);
        }
    }
}
