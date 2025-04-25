<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aval extends Model
{
    use HasFactory;

    protected $table = 'avales'; // Especificar el nombre de la tabla correctamente

    protected $fillable = [
        'rut',
        'nombre_completo',
        'direccion_hogar',
        'email',
        'telefono',
    ];

    public function deudores()
    {
        return $this->hasMany(Deudor::class);
    }
}
