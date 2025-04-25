<?php


namespace App\Livewire;

use Livewire\Component;
use App\Models\Aval;

class AvalForm extends Component
{
    public $rut, $nombre_completo, $direccion_hogar, $email, $telefono, $aval_id;
    public $isEditMode = false;
    public $avales;

    // Validaciones para los campos
    protected $rules = [
        'rut' => 'required|string|max:12',
        'nombre_completo' => 'required|string|max:255',
        'direccion_hogar' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|string|max:15',
    ];

    // Inicializa el componente cargando los avales
    public function mount()
    {
        $this->avales = Aval::all();
    }

    // Limpiar los campos después de cada acción
    public function resetFields()
    {
        $this->rut = '';
        $this->nombre_completo = '';
        $this->direccion_hogar = '';
        $this->email = '';
        $this->telefono = '';
        $this->aval_id = null;
        $this->isEditMode = false;
    }

    // Crear un nuevo aval
    public function store()
    {
        $this->validate();

        Aval::create([
            'rut' => $this->rut,
            'nombre_completo' => $this->nombre_completo,
            'direccion_hogar' => $this->direccion_hogar,
            'email' => $this->email,
            'telefono' => $this->telefono,
        ]);

        session()->flash('message', 'Aval creado exitosamente.');
        $this->resetFields();
        $this->avales = Aval::all();
    }

    // Cargar un aval para edición
    public function edit($id)
    {
        $aval = Aval::findOrFail($id);

        $this->aval_id = $aval->id;
        $this->rut = $aval->rut;
        $this->nombre_completo = $aval->nombre_completo;
        $this->direccion_hogar = $aval->direccion_hogar;
        $this->email = $aval->email;
        $this->telefono = $aval->telefono;

        $this->isEditMode = true;
    }

    // Actualizar un aval existente
    public function update()
    {
        $this->validate();

        $aval = Aval::findOrFail($this->aval_id);
        $aval->update([
            'rut' => $this->rut,
            'nombre_completo' => $this->nombre_completo,
            'direccion_hogar' => $this->direccion_hogar,
            'email' => $this->email,
            'telefono' => $this->telefono,
        ]);

        session()->flash('message', 'Aval actualizado exitosamente.');
        $this->resetFields();
        $this->avales = Aval::all();
    }

    // Eliminar un aval
    public function delete($id)
    {
        Aval::findOrFail($id)->delete();

        session()->flash('message', 'Aval eliminado exitosamente.');
        $this->avales = Aval::all();
    }

    // Renderizar la vista
    public function render()
    {
        return view('livewire.aval-form')->layout('layouts.app');
    }
}
