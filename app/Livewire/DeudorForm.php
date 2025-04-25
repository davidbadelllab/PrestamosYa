<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Deudor;
use App\Models\Aval;

class DeudorForm extends Component
{
    public $deudores, $avales;
    public $deudor_id, $rut, $nombre_completo, $direccion_hogar, $email, $telefono, $nombre_empresa, $direccion_negocio, $sueldo_mensual, $foto_rut_delante, $foto_rut_detras, $aval_id, $garantia;
    public $isEditMode = false;

    protected $rules = [
        'rut' => 'required|unique:deudores,rut',
        'nombre_completo' => 'required',
        'email' => 'required|email|unique:deudores,email',
        'telefono' => 'required',
        'sueldo_mensual' => 'required|numeric',
        'aval_id' => 'nullable|exists:avales,id',
    ];

    public function mount()
    {
        $this->deudores = Deudor::all();
        $this->avales = Aval::all();
    }

    public function store()
    {
        $this->validate();
        if (!Deudor::find($this->deudor_id)->deuda_activa) {
            Deudor::create([
                'rut' => $this->rut,
                'nombre_completo' => $this->nombre_completo,
                'direccion_hogar' => $this->direccion_hogar,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'nombre_empresa' => $this->nombre_empresa,
                'direccion_negocio' => $this->direccion_negocio,
                'sueldo_mensual' => $this->sueldo_mensual,
                'aval_id' => $this->aval_id,
                'garantia' => $this->garantia,
            ]);
            session()->flash('message', 'Deudor creado exitosamente.');
            $this->resetFields();
        }
    }

    public function edit($id)
    {
        $deudor = Deudor::findOrFail($id);
        $this->deudor_id = $deudor->id;
        $this->rut = $deudor->rut;
        $this->nombre_completo = $deudor->nombre_completo;
        $this->email = $deudor->email;
        $this->telefono = $deudor->telefono;
        $this->nombre_empresa = $deudor->nombre_empresa;
        $this->direccion_negocio = $deudor->direccion_negocio;
        $this->sueldo_mensual = $deudor->sueldo_mensual;
        $this->aval_id = $deudor->aval_id;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();
        $deudor = Deudor::findOrFail($this->deudor_id);
        $deudor->update([
            'rut' => $this->rut,
            'nombre_completo' => $this->nombre_completo,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'nombre_empresa' => $this->nombre_empresa,
            'direccion_negocio' => $this->direccion_negocio,
            'sueldo_mensual' => $this->sueldo_mensual,
            'aval_id' => $this->aval_id,
            'garantia' => $this->garantia,
        ]);
        session()->flash('message', 'Deudor actualizado exitosamente.');
        $this->resetFields();
        $this->isEditMode = false;
    }

    public function delete($id)
    {
        Deudor::findOrFail($id)->delete();
        session()->flash('message', 'Deudor eliminado exitosamente.');
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->deudor_id = null;
        $this->rut = null;
        $this->nombre_completo = null;
        $this->email = null;
        $this->telefono = null;
        $this->nombre_empresa = null;
        $this->direccion_negocio = null;
        $this->sueldo_mensual = null;
        $this->aval_id = null;
        $this->garantia = null;
        $this->isEditMode = false;
    }

    public function render()
    {
        $this->deudores = Deudor::all();
        return view('livewire.deudor-form')->layout('layouts.app'); // Ajusta la ruta al layout correcto
    }

}
