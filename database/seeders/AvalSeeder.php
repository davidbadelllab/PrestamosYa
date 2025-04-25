<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aval;

class AvalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $avales = [
            [
                'rut' => '12345678-9',
                'nombre_completo' => 'Roberto Méndez',
                'direccion_hogar' => 'Av. Principal 123, Santiago',
                'email' => 'roberto@mail.com',
                'telefono' => '+56912345678',
            ],
            [
                'rut' => '98765432-1',
                'nombre_completo' => 'Ana Martínez',
                'direccion_hogar' => 'Calle Los Pinos 456, Providencia',
                'email' => 'ana@mail.com',
                'telefono' => '+56923456789',
            ],
            [
                'rut' => '45678912-3',
                'nombre_completo' => 'Luis Torres',
                'direccion_hogar' => 'Pasaje Las Flores 789, Las Condes',
                'email' => 'luis@mail.com',
                'telefono' => '+56934567890',
            ],
            [
                'rut' => '78912345-6',
                'nombre_completo' => 'Carmen Silva',
                'direccion_hogar' => 'Av. Los Leones 321, Ñuñoa',
                'email' => 'carmen@mail.com',
                'telefono' => '+56945678901',
            ],
        ];

        foreach ($avales as $aval) {
            Aval::create($aval);
        }
    }
}
