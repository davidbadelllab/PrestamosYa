<div class="max-w-5xl mx-auto p-6 space-y-8">
    <!-- Formulario de deudor -->
    <h2 class="text-3xl font-bold text-gray-800 border-b-4 border-green-500 pb-3">
        {{ $isEditMode ? '✏️ Editar Deudor' : '➕ Crear Deudor' }}
    </h2>

    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="space-y-6 bg-gradient-to-r from-green-50 to-green-100 p-6 rounded-xl shadow-xl transition-all duration-300 transform hover:scale-105">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="rut" class="block text-sm font-medium text-gray-700">RUT</label>
                <input type="text" wire:model="rut" id="rut" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="RUT">
                @error('rut') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="nombre_completo" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                <input type="text" wire:model="nombre_completo" id="nombre_completo" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Nombre Completo">
                @error('nombre_completo') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model="email" id="email" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Email">
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                <input type="text" wire:model="telefono" id="telefono" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Teléfono">
                @error('telefono') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="nombre_empresa" class="block text-sm font-medium text-gray-700">Nombre de la Empresa</label>
                <input type="text" wire:model="nombre_empresa" id="nombre_empresa" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Empresa">
                @error('nombre_empresa') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="direccion_negocio" class="block text-sm font-medium text-gray-700">Dirección del Negocio</label>
                <input type="text" wire:model="direccion_negocio" id="direccion_negocio" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Dirección del Negocio">
                @error('direccion_negocio') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="mt-4">
            <label for="sueldo_mensual" class="block text-sm font-medium text-gray-700">Sueldo Mensual</label>
            <input type="number" wire:model="sueldo_mensual" id="sueldo_mensual" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all" placeholder="Sueldo Mensual">
            @error('sueldo_mensual') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-4">
            <label for="aval_id" class="block text-sm font-medium text-gray-700">Aval</label>
            <select wire:model="aval_id" id="aval_id" class="w-full mt-2 px-4 py-3 bg-white border border-gray-300 rounded-lg shadow focus:ring-2 focus:ring-green-400 transition-all">
                <option value="">Selecciona un Aval</option>
                @foreach ($avales as $aval)
                    <option value="{{ $aval->id }}">{{ $aval->nombre_completo }}</option>
                @endforeach
            </select>
            @error('aval_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full bg-green-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-green-700 shadow-lg focus:outline-none focus:ring-4 focus:ring-green-300 transition-transform duration-300 transform hover:scale-105">
                {{ $isEditMode ? '✏️ Actualizar Deudor' : '➕ Crear Deudor' }}
            </button>
        </div>
    </form>

    <div class="mt-10 bg-white p-6 rounded-xl shadow-2xl">
        <h3 class="text-xl font-semibold tracking-wide text-gray-800 mb-6">📋 Lista de Deudores</h3>

        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left border-collapse">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-4">RUT</th>
                        <th class="py-3 px-4">Nombre Completo</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Teléfono</th>
                        <th class="py-3 px-4">Sueldo Mensual</th>
                        <th class="py-3 px-4 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm font-light">
                    @foreach($deudores as $deudor)
                        <tr class="border-b border-gray-200 hover:bg-gray-100 transition-colors duration-150">
                            <td class="py-3 px-4">{{ $deudor->rut }}</td>
                            <td class="py-3 px-4">{{ $deudor->nombre_completo }}</td>
                            <td class="py-3 px-4">{{ $deudor->email }}</td>
                            <td class="py-3 px-4">{{ $deudor->telefono }}</td>
                            <td class="py-3 px-4">{{ number_format($deudor->sueldo_mensual, 2) }} $</td>
                            <td class="py-3 px-4 text-center">
                                <button wire:click="edit({{ $deudor->id }})" class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-4 py-1 rounded-md shadow-md transition-all">Editar</button>
                                <button wire:click="delete({{ $deudor->id }})" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-1 rounded-md ml-2 shadow-md transition-all">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
