<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserForm extends Component
{
    public $users, $user_id, $name, $email, $password, $isEditMode = false;

    // Cargar los usuarios cuando se monte el componente
    public function mount()
    {
        $this->users = User::all();
    }

    // Validaciones de los campos del formulario
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    // Limpiar los campos del formulario
    public function resetInputFields()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->isEditMode = false;
    }

    // Guardar nuevo usuario
    public function store()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'Usuario creado correctamente.');
        $this->resetInputFields();
        $this->users = User::all(); // Recargar la lista de usuarios
    }

    // Llenar el formulario con los datos del usuario para editar
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->isEditMode = true;
    }

    // Actualizar usuario
    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
        ]);

        $user = User::findOrFail($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', 'Usuario actualizado correctamente.');
        $this->resetInputFields();
        $this->users = User::all(); // Recargar la lista de usuarios
    }

    // Eliminar usuario
    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('message', 'Usuario eliminado correctamente.');
        $this->users = User::all(); // Recargar la lista de usuarios
    }

    // Renderizar la vista
    public function render()
    {
        return view('livewire.user-form')
            ->layout('layouts.app'); // Asegúrate de que este layout existe.
    }
}
