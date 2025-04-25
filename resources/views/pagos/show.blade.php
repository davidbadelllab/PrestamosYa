<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="mb-6">
                    <a href="{{ route('pagos.index') }}" class="text-indigo-600 hover:text-indigo-900">
                        ← Volver a la lista
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Información del Pago</h3>
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID del Pago</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $pago->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Monto</dt>
                                <dd class="mt-1 text-sm text-gray-900">${{ number_format($pago->monto, 2) }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Fecha de Pago</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $pago->fecha_pago->format('d/m/Y H:i') }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Método de Pago</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pago->metodo_pago == 'efectivo' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                                        {{ ucfirst($pago->metodo_pago) }}
                                    </span>
                                </dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Estado</dt>
                                <dd class="mt-1">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $pago->estado == 'completado' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ ucfirst($pago->estado) }}
                                    </span>
                                </dd>
                            </div>
                            @if($pago->numero_transaccion)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Número de Transacción</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $pago->numero_transaccion }}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>

                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Información del Préstamo</h3>
                        <dl class="grid grid-cols-1 gap-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ID del Préstamo</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $pago->prestamo->id }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Deudor</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $pago->prestamo->deudor->nombre_completo }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Monto del Préstamo</dt>
                                <dd class="mt-1 text-sm text-gray-900">${{ number_format($pago->prestamo->monto_prestamo, 2) }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Monto Abonado</dt>
                                <dd class="mt-1 text-sm text-gray-900">${{ number_format($pago->prestamo->monto_abonado, 2) }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end space-x-4">
                    <a href="{{ route('pagos.edit', $pago) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                        Editar Pago
                    </a>
                    <form action="{{ route('pagos.destroy', $pago) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('¿Está seguro de eliminar este pago?')">
                            Eliminar Pago
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 