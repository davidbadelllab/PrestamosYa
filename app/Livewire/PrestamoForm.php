<?php

namespace App\Livewire;

use App\Models\Prestamo;
use App\Models\Deudor;
use App\Models\Aval;
use Livewire\Component;

class PrestamoForm extends Component
{
    public $deudores;
    public $avales;
    public $deudor_id, $aval_id, $monto_prestamo, $fecha_inicio, $metodo_pago, $numero_transaccion;
    public $isEditMode = false;
    public $prestamos;
    public $monto_abono;
    public $prestamo_id; // Agregamos esta variable para almacenar el ID del préstamo

    public function mount()
    {
        $this->deudores = Deudor::all();
        $this->avales = Aval::all();
        $this->prestamos = Prestamo::all();
    }

    public function store()
    {
        $this->validate([
            'deudor_id' => 'required',
            'monto_prestamo' => 'required|numeric|max:' . $this->calcularMaximoPrestamo(),
            'fecha_inicio' => 'required|date',
            'metodo_pago' => 'required',
        ]);

        $prestamo = Prestamo::create([
            'deudor_id' => $this->deudor_id,
            'aval_id' => $this->aval_id,
            'monto_prestamo' => $this->monto_prestamo,
            'saldo_restante' => $this->monto_prestamo,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => now()->addWeek(),
            'estado' => 'pendiente',
            'metodo_pago' => $this->metodo_pago,
            'numero_transaccion' => $this->metodo_pago == 'transferencia' ? $this->numero_transaccion : null,
            'abonos' => 0, // Inicializamos los abonos en 0
        ]);

        $this->reset();
        $this->prestamos = Prestamo::all();
        session()->flash('message', 'Préstamo creado exitosamente.');
    }

    public function abonar($prestamoId)
    {
        $this->validate([
            'monto_abono' => 'required|numeric|min:0.01',
        ]);

        // Obtener el préstamo por ID
        $prestamo = Prestamo::find($prestamoId);

        // Sumar el abono
        $prestamo->abonos += $this->monto_abono;
        $prestamo->save();

        $this->reset('monto_abono');
        $this->prestamos = Prestamo::all();
        session()->flash('message', 'Abono registrado exitosamente.');
    }

    public function calcularMaximoPrestamo()
    {
        $deudor = Deudor::find($this->deudor_id);
        return $deudor->sueldo_mensual * 0.35;
    }

    public function render()
    {
        return view('livewire.prestamo-form');
    }
}
