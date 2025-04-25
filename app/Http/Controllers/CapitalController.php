<?php

namespace App\Http\Controllers;

use App\Models\Capital;
use Illuminate\Http\Request;

class CapitalController extends Controller
{
    public function index()
    {
        $capital = Capital::first();

        // Define una condición para mostrar el formulario, aquí puedes cambiarla según tu lógica
        $condition = true;  // Ejemplo: Mostrar el formulario siempre

        return view('capital.index', compact('capital', 'condition'));
    }



    public function update(Request $request)
    {
        $request->validate([
            'aumento_capital' => 'required|numeric|min:0',
        ]);

        $capital = Capital::first();
        $capital->update([
            'aumento_capital' => $capital->aumento_capital + $request->aumento_capital,
        ]);

        return redirect()->back()->with('message', 'Capital aumentado correctamente.');
    }

    public function calcularGananciasTotales()
    {
        $capital = Capital::first();
        $gananciasTotales = $capital->calcularGananciasTotales();

        $capital->update([
            'ganancias_totales' => $gananciasTotales,
        ]);

        return redirect()->back()->with('message', 'Ganancias totales calculadas correctamente.');
    }
}
