<?php

namespace App\Http\Controllers;

use App\Models\Deudor;
use App\Models\Aval;
use App\Models\Prestamo;
use App\Models\Capital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            // Obtener los datos con manejo de errores
            $totalDeudores = Deudor::count() ?? 0;
            $totalAvales = Aval::count() ?? 0;
            
            // Calcular ganancias totales
            $totalGanancias = Prestamo::where('estado_deuda', 'pagado')
                ->sum(DB::raw('monto_prestamo * (interes_semanal / 100)')) ?? 0;
            
            // Próximos pagos (préstamos que vencen en la próxima semana)
            $proximosPagos = Prestamo::where('fecha_final', '>', now())
                ->where('fecha_final', '<=', now()->addWeek())
                ->where('estado_deuda', 'pendiente')
                ->count() ?? 0;
            
            // Deudas pagadas y en mora
            $deudasPagadas = Prestamo::where('estado_deuda', 'pagado')->count() ?? 0;
            $deudasMora = Prestamo::where('fecha_final', '<', now())
                ->where('estado_deuda', 'pendiente')
                ->count() ?? 0;
            
            // Total de deudas activas
            $totalDeudas = Prestamo::where('estado_deuda', 'pendiente')->count() ?? 0;
            
            // Información del capital
            $capital = Capital::first();
            $capitalInicial = $capital ? $capital->capital_inicial : 0;
            $aumentoCapital = $capital ? $capital->aumento_capital : 0;

            // Pasar los datos a la vista
            return view('components.welcome', compact(
                'totalDeudores',
                'totalAvales',
                'totalGanancias',
                'proximosPagos',
                'deudasPagadas',
                'deudasMora',
                'totalDeudas',
                'capitalInicial',
                'aumentoCapital'
            ));
        } catch (\Exception $e) {
            // Log del error
            \Log::error('Error en DashboardController: ' . $e->getMessage());
            
            // Retornar vista con valores por defecto
            return view('components.welcome', [
                'totalDeudores' => 0,
                'totalAvales' => 0,
                'totalGanancias' => 0,
                'proximosPagos' => 0,
                'deudasPagadas' => 0,
                'deudasMora' => 0,
                'totalDeudas' => 0,
                'capitalInicial' => 0,
                'aumentoCapital' => 0
            ])->with('error', 'Hubo un problema al cargar los datos del dashboard');
        }
    }
}
