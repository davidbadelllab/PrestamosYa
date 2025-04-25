<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::with('prestamo.deudor')->latest()->get();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prestamos = Prestamo::with('deudor')->get();
        return view('pagos.create', compact('prestamos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|in:efectivo,transferencia',
            'estado' => 'required|in:pendiente,completado',
            'numero_transaccion' => 'nullable|required_if:metodo_pago,transferencia|string|max:255',
        ]);

        $pago = Pago::create($validated);

        if ($pago->estado === 'completado') {
            $prestamo = Prestamo::find($pago->prestamo_id);
            $prestamo->monto_abonado += $pago->monto;
            
            if ($prestamo->monto_abonado >= $prestamo->monto_prestamo) {
                $prestamo->estado_deuda = 'pagado';
            }
            
            $prestamo->save();
        }

        return redirect()->route('pagos.index')
            ->with('success', 'Pago registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        $pago->load('prestamo.deudor');
        return view('pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        $prestamos = Prestamo::with('deudor')->get();
        return view('pagos.edit', compact('pago', 'prestamos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        $validated = $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'fecha_pago' => 'required|date',
            'metodo_pago' => 'required|in:efectivo,transferencia',
            'estado' => 'required|in:pendiente,completado',
            'numero_transaccion' => 'nullable|required_if:metodo_pago,transferencia|string|max:255',
        ]);

        // Si el estado cambia de pendiente a completado
        if ($pago->estado === 'pendiente' && $validated['estado'] === 'completado') {
            $prestamo = Prestamo::find($pago->prestamo_id);
            $prestamo->monto_abonado += $pago->monto;
            
            if ($prestamo->monto_abonado >= $prestamo->monto_prestamo) {
                $prestamo->estado_deuda = 'pagado';
            }
            
            $prestamo->save();
        }
        // Si el estado cambia de completado a pendiente
        elseif ($pago->estado === 'completado' && $validated['estado'] === 'pendiente') {
            $prestamo = Prestamo::find($pago->prestamo_id);
            $prestamo->monto_abonado -= $pago->monto;
            
            if ($prestamo->estado_deuda === 'pagado') {
                $prestamo->estado_deuda = 'pendiente';
            }
            
            $prestamo->save();
        }

        $pago->update($validated);

        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        if ($pago->estado === 'completado') {
            $prestamo = Prestamo::find($pago->prestamo_id);
            $prestamo->monto_abonado -= $pago->monto;
            
            if ($prestamo->estado_deuda === 'pagado') {
                $prestamo->estado_deuda = 'pendiente';
            }
            
            $prestamo->save();
        }

        $pago->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}
