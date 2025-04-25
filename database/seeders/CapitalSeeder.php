<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Capital;
use Carbon\Carbon;

class CapitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Capital::create([
            'capital_inicial' => 5000000,
            'aumento_capital' => 2000000,
            'ganancias_totales' => 800000,
            'ultima_actualizacion' => Carbon::now(),
        ]);
    }
}
