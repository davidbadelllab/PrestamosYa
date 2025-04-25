<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pago;
use Carbon\Carbon;

class PagoSeeder extends Seeder
{
    public function run()
    {
        $pagos = [
            [
                'prestamo_id' => 1,
                'monto' => 500.00,
                'fecha_pago' => Carbon::now()->subDays(15),
                'metodo_pago' => 'efectivo',
                'estado' => 'completado',
                'numero_transaccion' => null
            ],
            [
                'prestamo_id' => 1,
                'monto' => 500.00,
                'fecha_pago' => Carbon::now()->subDays(10),
                'metodo_pago' => 'transferencia',
                'estado' => 'completado',
                'numero_transaccion' => 'TR-' . rand(1000000, 9999999)
            ],
            [
                'prestamo_id' => 2,
                'monto' => 750.00,
                'fecha_pago' => Carbon::now()->subDays(5),
                'metodo_pago' => 'efectivo',
                'estado' => 'completado',
                'numero_transaccion' => null
            ],
            [
                'prestamo_id' => 3,
                'monto' => 1000.00,
                'fecha_pago' => Carbon::now(),
                'metodo_pago' => 'transferencia',
                'estado' => 'pendiente',
                'numero_transaccion' => 'TR-' . rand(1000000, 9999999)
            ],
            [
                'prestamo_id' => 4,
                'monto' => 1200.00,
                'fecha_pago' => Carbon::now()->addDays(5),
                'metodo_pago' => 'efectivo',
                'estado' => 'pendiente',
                'numero_transaccion' => null
            ]
        ];

        foreach ($pagos as $pago) {
            Pago::create($pago);
        }
    }
} 