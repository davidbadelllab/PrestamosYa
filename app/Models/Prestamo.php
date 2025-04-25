<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';

    protected $fillable = [
        'deudor_id',
        'aval_id',
        'monto_prestamo',
        'fecha_inicio',
        'fecha_final',
        'interes_semanal',
        'monto_abonado',
        'estado_deuda',
        'metodo_prestamo',
        'numero_transaccion',
        'foto_rut_delante',
        'foto_rut_detras',
    ];

    protected $dates = [
        'fecha_inicio',
        'fecha_final',
    ];

    protected $casts = [
        'monto_prestamo' => 'decimal:2',
        'interes_semanal' => 'decimal:2',
        'monto_abonado' => 'decimal:2',
    ];

    // Relaciones
    public function deudor()
    {
        return $this->belongsTo(Deudor::class);
    }

    public function aval()
    {
        return $this->belongsTo(Aval::class);
    }

    // Atributos calculados
    public function getDeudaRestanteAttribute()
    {
        return $this->monto_prestamo - $this->monto_abonado;
    }

    public function getGananciaAttribute()
    {
        return $this->monto_prestamo * ($this->interes_semanal / 100);
    }

    public function getEstaVencidoAttribute()
    {
        return Carbon::parse($this->fecha_final)->isPast();
    }

    public function getEstaEnMoraAttribute()
    {
        return $this->esta_vencido && $this->estado_deuda === 'pendiente';
    }

    // Scopes
    public function scopePendientes($query)
    {
        return $query->where('estado_deuda', 'pendiente');
    }

    public function scopePagados($query)
    {
        return $query->where('estado_deuda', 'pagado');
    }

    public function scopeEnMora($query)
    {
        return $query->where('fecha_final', '<', now())
            ->where('estado_deuda', 'pendiente');
    }

    public function scopeProximosAVencer($query, $dias = 7)
    {
        return $query->where('fecha_final', '>', now())
            ->where('fecha_final', '<=', now()->addDays($dias))
            ->where('estado_deuda', 'pendiente');
    }
}
