<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Deudor;

class DeudorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deudores = [
            [
                'rut' => '11111111-1',
                'nombre_completo' => 'Pedro Sánchez',
                'direccion_hogar' => 'Calle Principal 789, Santiago',
                'email' => 'pedro@mail.com',
                'telefono' => '+56956789012',
                'nombre_empresa' => 'Comercial Santiago',
                'direccion_negocio' => 'Av. Comercio 123',
                'sueldo_mensual' => 850000,
                'deuda_activa' => true,
                'aval_id' => 1,
                'garantia' => 'Automóvil patente ABCD12',
            ],
            [
                'rut' => '22222222-2',
                'nombre_completo' => 'Laura Ramírez',
                'direccion_hogar' => 'Pasaje Los Aromos 456, Providencia',
                'email' => 'laura@mail.com',
                'telefono' => '+56967890123',
                'nombre_empresa' => 'Tienda Express',
                'direccion_negocio' => 'Calle Comercial 456',
                'sueldo_mensual' => 950000,
                'deuda_activa' => true,
                'aval_id' => 2,
                'garantia' => 'Notebook MacBook Pro',
            ],
            [
                'rut' => '33333333-3',
                'nombre_completo' => 'Miguel Flores',
                'direccion_hogar' => 'Av. Las Rosas 123, Las Condes',
                'email' => 'miguel@mail.com',
                'telefono' => '+56978901234',
                'nombre_empresa' => 'Distribuidora Central',
                'direccion_negocio' => 'Av. Industrial 789',
                'sueldo_mensual' => 1200000,
                'deuda_activa' => false,
                'aval_id' => 3,
                'garantia' => 'Televisor Samsung 65"',
            ],
            [
                'rut' => '44444444-4',
                'nombre_completo' => 'Isabel Morales',
                'direccion_hogar' => 'Calle Los Olivos 789, Ñuñoa',
                'email' => 'isabel@mail.com',
                'telefono' => '+56989012345',
                'nombre_empresa' => 'Minimarket El Sol',
                'direccion_negocio' => 'Pasaje Comercial 321',
                'sueldo_mensual' => 780000,
                'deuda_activa' => true,
                'aval_id' => 4,
                'garantia' => 'PlayStation 5',
            ],
        ];

        foreach ($deudores as $deudor) {
            Deudor::create($deudor);
        }
    }
}
