<x-app-layout>
    <!-- Dashboard Content -->
    <div class="p-6 w-full">
        <!-- Welcome Section -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                👋 Bienvenido, {{ Auth::user()->name }}
            </h1>
            <p class="text-gray-600">Aquí está el resumen de tu actividad reciente</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Préstamos -->
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-blue-400 bg-opacity-30 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-sm text-blue-100">Total Préstamos</p>
                        <p class="text-2xl font-bold">${{ number_format($totalPrestamos, 2) }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-blue-100">{{ $prestamosNuevos }} nuevos este mes</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-green-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span class="text-sm text-green-300">{{ $porcentajeCrecimiento }}%</span>
                    </div>
                </div>
            </div>

            <!-- Préstamos Activos -->
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-green-400 bg-opacity-30 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-sm text-green-100">Préstamos Activos</p>
                        <p class="text-2xl font-bold">{{ $prestamosActivos }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-green-100">{{ $prestamosNuevosSemana }} nuevos esta semana</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-green-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span class="text-sm text-green-300">{{ $porcentajeActivosNuevos }}%</span>
                    </div>
                </div>
            </div>

            <!-- Pagos Pendientes -->
            <div class="bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-yellow-400 bg-opacity-30 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-sm text-yellow-100">Pagos Pendientes</p>
                        <p class="text-2xl font-bold">{{ $pagosPendientes }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-yellow-100">{{ $pagosVencenHoy }} vencen hoy</p>
                    <div class="flex items-center">
                        @if($pagosVencenHoy > 0)
                            <svg class="w-4 h-4 text-yellow-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                            <span class="text-sm text-yellow-300">Urgente</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Capital Disponible -->
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-lg hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center justify-between mb-4">
                    <div class="bg-purple-400 bg-opacity-30 rounded-lg p-3">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div class="flex flex-col items-end">
                        <p class="text-sm text-purple-100">Capital Disponible</p>
                        <p class="text-2xl font-bold">${{ number_format($capitalDisponible, 2) }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <p class="text-sm text-purple-100">Actualizado {{ $ultimaActualizacionCapital }}</p>
                    <div class="flex items-center">
                        <svg class="w-4 h-4 text-purple-300 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        <span class="text-sm text-purple-300">{{ $porcentajeCapital }}%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Gráfico de Préstamos -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Préstamos por Mes</h3>
                    <div class="flex items-center space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded-full hover:bg-blue-100">Mes</button>
                        <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-full">Año</button>
                    </div>
                </div>
                <div class="h-80">
                    <canvas id="loansChart"></canvas>
                </div>
            </div>

            <!-- Tabla de Últimos Préstamos -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Últimos Préstamos</h3>
                    <a href="{{ route('prestamo.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Ver todos</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-3">Cliente</th>
                                <th class="px-6 py-3">Monto</th>
                                <th class="px-6 py-3">Estado</th>
                                <th class="px-6 py-3">Fecha</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse($ultimosPrestamos as $prestamo)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-semibold">
                                                {{ substr($prestamo->deudor->nombre, 0, 1) }}{{ substr($prestamo->deudor->apellido, 0, 1) }}
                                            </div>
                                            <span class="ml-3 font-medium text-gray-900">{{ $prestamo->deudor->nombre }} {{ $prestamo->deudor->apellido }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-gray-900">${{ number_format($prestamo->monto, 2) }}</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 text-xs font-semibold 
                                            @if($prestamo->estado == 'activo') text-green-800 bg-green-100 
                                            @elseif($prestamo->estado == 'pendiente') text-yellow-800 bg-yellow-100 
                                            @else text-gray-800 bg-gray-100 
                                            @endif rounded-full">
                                            {{ ucfirst($prestamo->estado) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-gray-500">{{ $prestamo->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">No hay préstamos recientes</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Actividad Reciente -->
            <div class="lg:col-span-2 bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Actividad Reciente</h3>
                    <button class="text-blue-600 hover:text-blue-700 text-sm font-medium">Ver todo</button>
                </div>
                <div class="space-y-6">
                    @forelse($actividadReciente as $actividad)
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="h-10 w-10 rounded-full {{ $actividad->tipo == 'prestamo' ? 'bg-green-500' : 'bg-blue-500' }} flex items-center justify-center text-white">
                                    @if($actividad->tipo == 'prestamo')
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @else
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    @endif
                                </div>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900">{{ $actividad->descripcion }}</p>
                                <p class="text-sm text-gray-500">{{ $actividad->detalles }}</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $actividad->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center">No hay actividad reciente</p>
                    @endforelse
                </div>
            </div>

            <!-- Próximos Pagos -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-800">Próximos Pagos</h3>
                    <a href="{{ route('pagos.index') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium">Ver todos</a>
                </div>
                <div class="space-y-4">
                    @forelse($proximosPagos as $pago)
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-medium text-gray-900">{{ $pago->prestamo->deudor->nombre }} {{ $pago->prestamo->deudor->apellido }}</p>
                                <p class="text-sm text-gray-500">${{ number_format($pago->monto, 2) }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium {{ $pago->dias_restantes <= 3 ? 'text-red-600' : 'text-gray-900' }}">
                                    {{ $pago->fecha_pago->format('d M') }}
                                </p>
                                <p class="text-xs text-gray-500">{{ $pago->dias_restantes }} días</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center">No hay pagos próximos</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('loansChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($graficoMeses),
                    datasets: [{
                        label: 'Préstamos',
                        data: @json($graficoMontos),
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: true,
                                color: 'rgba(0, 0, 0, 0.1)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
    @endpush
</x-app-layout>
