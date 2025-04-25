<div class="max-w-7xl mx-auto p-4 sm:p-6 space-y-6">
    <!-- Mensaje de éxito -->
    @if (session()->has('message'))
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-4 shadow-md transition-all duration-300 ease-in-out">
            {{ session('message') }}
        </div>
    @endif

    <!-- Formulario de usuario -->
    <form wire:submit.prevent="{{ $isEditMode ? 'update' : 'store' }}" class="space-y-6 bg-white p-4 sm:p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105">
        <h2 class="text-xl sm:text-2xl font-semibold tracking-wide text-gray-800">
            {{ $isEditMode ? '✍️ Editar Usuario' : '✨ Crear Usuario' }}
        </h2>

        <div>
            <label for="name" class="block text-sm font-medium text-gray-600">Nombre</label>
            <input type="text" wire:model="name" id="name" placeholder="Ingresa el nombre" class="block w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-600">Email</label>
            <input type="email" wire:model="email" id="email" placeholder="Ingresa el correo" class="block w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        @if (!$isEditMode)
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Contraseña</label>
                <input type="password" wire:model="password" id="password" placeholder="Ingresa la contraseña" class="block w-full mt-2 px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">
                @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
        @endif

        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition-all duration-300">
            {{ $isEditMode ? 'Actualizar Usuario' : 'Crear Usuario' }}
        </button>
    </form>

    <!-- Lista de usuarios -->
    <div class="mt-8 bg-white p-4 sm:p-6 rounded-lg shadow-2xl">
        <h3 class="text-lg sm:text-xl font-semibold tracking-wide text-gray-800">📋 Lista de Usuarios</h3>

        <div class="overflow-x-auto">
            <table class="w-full mt-6 table-auto text-left">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-xs sm:text-sm leading-normal">
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-xs sm:text-sm font-light">
                    @foreach($users as $user)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $user->name }}</td>
                            <td class="py-3 px-4">{{ $user->email }}</td>
                            <td class="py-3 px-4 flex flex-col sm:flex-row gap-2">
                                <button wire:click="edit({{ $user->id }})" class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-1 rounded-md shadow-md transition-all">Editar</button>
                                <button wire:click="delete({{ $user->id }})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-md shadow-md transition-all">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
