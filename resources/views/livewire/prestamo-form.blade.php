<div class="max-w-7xl mx-auto p-6 space-y-6 bg-white shadow-xl rounded-lg">
    <h2 class="text-2xl font-bold">{{ $isEditMode ? 'Editar Préstamo' : 'Crear Préstamo' }}</h2>

    <form wire:submit.prevent="store" class="space-y-4">
        <div>
            <label for="deudor_id" class="block text-sm font-medium text-gray-700">Deudor</label>
            <select wire:model="deudor_id" id="deudor_id" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecciona un Deudor</option>
                @foreach($deudores as $deudor)
                    <option value="{{ $deudor->id }}">{{ $deudor->nombre_completo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="aval_id" class="block text-sm font-medium text-gray-700">Aval</label>
            <select wire:model="aval_id" id="aval_id" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecciona un Aval</option>
                @foreach($avales as $aval)
                    <option value="{{ $aval->id }}">{{ $aval->nombre_completo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="monto_prestamo" class="block text-sm font-medium text-gray-700">Monto del Préstamo</label>
            <input type="number" wire:model="monto_prestamo" id="monto_prestamo" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Monto">
        </div>

        <div>
            <label for="fecha_inicio" class="block text-sm font-medium text-gray-700">Fecha de Inicio</label>
            <input type="date" wire:model="fecha_inicio" id="fecha_inicio" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="metodo_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
            <select wire:model="metodo_pago" id="metodo_pago" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                <option value="efectivo">Efectivo</option>
                <option value="transferencia">Transferencia</option>
            </select>
        </div>

        @if($metodo_pago == 'transferencia')
            <div>
                <label for="numero_transaccion" class="block text-sm font-medium text-gray-700">Número de Transacción</label>
                <input type="text" wire:model="numero_transaccion" id="numero_transaccion" class="block w-full mt-1 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Número de Transacción">
            </div>
        @endif

        <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg shadow-md hover:bg-blue-700">Guardar Préstamo</button>
    </form>

    <!-- Abonar -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold">Realizar Abono</h3>
        <div class="mt-2">
            <input type="number" wire:model="monto_abono" placeholder="Monto de abono" class="block w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            <button wire:click="abonar({{ $prestamo_id }})" class="mt-2 bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600">Abonar</button>
        </div>
    </div>

    <!-- Lista de préstamos -->
    <div class="mt-6">
        <h3 class="text-xl font-semibold">Lista de Préstamos</h3>
        <div class="overflow-x-auto">
            <table class="w-full mt-4 table-auto border-collapse text-left">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="py-2 px-4">Deudor</th>
                        <th class="py-2 px-4">Aval</th>
                        <th class="py-2 px-4">Monto Prestado</th>
                        <th class="py-2 px-4">Abonos</th>
                        <th class="py-2 px-4">Fecha Inicio</th>
                        <th class="py-2 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @foreach($prestamos as $prestamo)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $prestamo->deudor->nombre_completo }}</td>
                            <td class="py-2 px-4">{{ $prestamo->aval ? $prestamo->aval->nombre_completo : 'Sin Aval' }}</td>
                            <td class="py-2 px-4">{{ $prestamo->monto_prestamo }}</td>
                            <td class="py-2 px-4">{{ $prestamo->abonos }}</td>
                            <td class="py-2 px-4">{{ $prestamo->fecha_inicio }}</td>
                            <td class="py-2 px-4 text-center">
                                <button wire:click="edit({{ $prestamo->id }})" class="bg-yellow-400 text-white px-4 py-1 rounded-lg">Editar</button>
                                <button wire:click="delete({{ $prestamo->id }})" class="bg-red-500 text-white px-4 py-1 rounded-lg ml-2">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
