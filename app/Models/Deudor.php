<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deudor extends Model
{
    use HasFactory;

    // Definir explícitamente el nombre de la tabla
    protected $table = 'deudores';

    protected $fillable = [
        'rut',
        'nombre_completo',
        'direccion_hogar',
        'email',
        'telefono',
        'nombre_empresa',
        'direccion_negocio',
        'sueldo_mensual',
        'foto_rut_delante',
        'foto_rut_detras',
        'deuda_activa',
        'aval_id',
        'garantia',
    ];

    public function aval()
    {
        return $this->belongsTo(Aval::class);
    }
}
