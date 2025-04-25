<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Deudor;
use App\Models\Aval;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    public function index()
    {
        $prestamos = Prestamo::with('deudor', 'aval')->get();
        return view('prestamos.index', compact('prestamos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'deudor_id' => 'required|exists:deudores,id',
            'monto_prestamo' => 'required|numeric|max:' . $this->calcularMaximoPrestamo($request->deudor_id),
            'metodo_pago' => 'required',
            'fecha_inicio' => 'required|date',
        ]);

        $prestamo = Prestamo::create([
            'deudor_id' => $request->deudor_id,
            'aval_id' => $request->aval_id,
            'monto_prestamo' => $request->monto_prestamo,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => now()->addWeek(),
            'estado' => 'pendiente',
            'metodo_pago' => $request->metodo_pago,
            'numero_transaccion' => $request->numero_transaccion,
            'foto_rut_delante' => $request->foto_rut_delante,
            'foto_rut_detras' => $request->foto_rut_detras,
            'abonos' => 0,  // Inicializamos los abonos en 0
        ]);

        return redirect()->back()->with('message', 'Préstamo creado exitosamente.');
    }

    public function abonar(Request $request, $prestamoId)
    {
        $prestamo = Prestamo::find($prestamoId);

        $request->validate([
            'monto_abono' => 'required|numeric|min:0.01',
        ]);

        // Sumar el abono sin afectar el monto prestado
        $prestamo->abonos += $request->monto_abono;
        $prestamo->save();

        return redirect()->back()->with('message', 'Abono registrado exitosamente.');
    }

    private function calcularMaximoPrestamo($deudorId)
    {
        $deudor = Deudor::find($deudorId);
        return $deudor->sueldo_mensual * 0.35;
    }
}
