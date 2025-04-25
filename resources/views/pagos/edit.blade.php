<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Pago') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('pagos.update', $pago) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('pagos.form')

                    <div class="mt-6 flex items-center justify-end">
                        <a href="{{ route('pagos.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">
                            Cancelar
                        </a>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            Actualizar Pago
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout> 