<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Capital extends Model
{
    use HasFactory;

    protected $fillable = [
        'capital_inicial',
        'aumento_capital',
        'ganancias_totales',
        'ultima_actualizacion'
    ];

    protected $casts = [
        'capital_inicial' => 'decimal:2',
        'aumento_capital' => 'decimal:2',
        'ganancias_totales' => 'decimal:2',
        'ultima_actualizacion' => 'datetime',
    ];

    // Método para calcular el capital total actual
    public function getCapitalTotalAttribute()
    {
        return $this->capital_inicial + $this->aumento_capital;
    }

    // Método para calcular las ganancias por deudor
    public function calcularGananciasPorDeudor($deudorId)
    {
        return Prestamo::where('deudor_id', $deudorId)
            ->where('estado_deuda', 'pagado')
            ->sum(\DB::raw('monto_prestamo * (interes_semanal / 100)'));
    }

    // Método para calcular el total de las ganancias
    public function calcularGananciasTotales()
    {
        $ganancias = Prestamo::where('estado_deuda', 'pagado')
            ->sum(\DB::raw('monto_prestamo * (interes_semanal / 100)'));
        
        $this->update([
            'ganancias_totales' => $ganancias,
            'ultima_actualizacion' => now()
        ]);

        return $ganancias;
    }

    // Método para aumentar el capital
    public function aumentarCapital($monto)
    {
        $this->increment('aumento_capital', $monto);
        $this->update(['ultima_actualizacion' => now()]);
        return $this->fresh();
    }

    // Método para obtener el resumen financiero
    public function obtenerResumenFinanciero()
    {
        return [
            'capital_inicial' => $this->capital_inicial,
            'aumento_capital' => $this->aumento_capital,
            'capital_total' => $this->capital_total,
            'ganancias_totales' => $this->ganancias_totales,
            'ultima_actualizacion' => $this->ultima_actualizacion,
            'prestamos_activos' => Prestamo::pendientes()->count(),
            'prestamos_pagados' => Prestamo::pagados()->count(),
            'prestamos_mora' => Prestamo::enMora()->count(),
        ];
    }
}
