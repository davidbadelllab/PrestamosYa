<?php

namespace App\Livewire;

use App\Models\Capital;
use Livewire\Component;

class CapitalForm extends Component
{
    public $capital;
    public $aumento_capital;

    public function mount()
    {
        $this->capital = Capital::first();
    }

    public function actualizarCapital()
    {
        $this->validate([
            'aumento_capital' => 'required|numeric|min:0',
        ]);

        $this->capital->update([
            'aumento_capital' => $this->capital->aumento_capital + $this->aumento_capital,
        ]);

        $this->aumento_capital = null; // Limpiar el campo
        session()->flash('message', 'Capital aumentado correctamente.');
    }

    public function calcularGanancias()
    {
        $gananciasTotales = $this->capital->calcularGananciasTotales();
        $this->capital->update(['ganancias_totales' => $gananciasTotales]);

        session()->flash('message', 'Ganancias totales calculadas correctamente.');
    }

    public function render()
    {
        return view('livewire.capital-form');
    }
}
