@php
    $condition = true; // O la lógica que determine esta condición.
@endphp

<div class="max-w-5xl mx-auto p-8 bg-gradient-to-b from-blue-50 to-blue-100 rounded-3xl shadow-2xl transform hover:scale-105 transition duration-500">
    <h2 class="text-4xl font-bold text-gray-800 mb-6 tracking-wide uppercase">
        Gestión de Capital 💼
    </h2>

    <!-- Mensaje de Éxito -->
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 rounded-lg shadow-md mb-6 transition duration-300 ease-in-out transform hover:scale-105">
            {{ session('message') }}
        </div>
    @endif

    <!-- Capital Actual -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-6 transform hover:translate-y-1 transition-all duration-500 ease-out">
        <h3 class="text-2xl font-semibold text-blue-900 mb-4">
            💰 Detalles del Capital Actual
        </h3>
        <div class="space-y-4">
            <p class="text-xl font-medium text-gray-700">Capital Inicial:
                <span class="text-blue-600 font-bold">${{ number_format($capital->capital_inicial, 2) }}</span>
            </p>
            <p class="text-xl font-medium text-gray-700">Aumento de Capital:
                <span class="text-green-600 font-bold">${{ number_format($capital->aumento_capital, 2) }}</span>
            </p>
            <p class="text-xl font-medium text-gray-700">Ganancias Totales:
                <span class="text-purple-600 font-bold">${{ number_format($capital->ganancias_totales, 2) }}</span>
            </p>
        </div>
    </div>

    <!-- Formulario de Aumento de Capital -->
    <form wire:submit.prevent="actualizarCapital" class="bg-white p-6 rounded-lg shadow-lg transition duration-500 ease-in-out transform hover:translate-y-2">
        <div class="mb-4">
            <label for="aumento_capital" class="block text-lg font-semibold text-gray-700 mb-2">
                Aumentar Capital 💵
            </label>
            <input type="number" wire:model="aumento_capital" id="aumento_capital" placeholder="Introduce la cantidad" class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition duration-300 ease-in-out hover:shadow-md">
        </div>

        <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-500 text-white py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl hover:from-indigo-600 hover:to-purple-600 transition-all duration-300 ease-in-out transform hover:scale-105">
            Aumentar Capital
        </button>
    </form>

    <!-- Botón de Calcular Ganancias -->
    <button wire:click="calcularGanancias" class="mt-6 w-full bg-gradient-to-r from-green-500 to-teal-500 text-white py-3 rounded-lg font-semibold shadow-lg hover:shadow-xl hover:from-green-600 hover:to-teal-600 transition-all duration-300 ease-in-out transform hover:scale-105">
        Calcular Ganancias 📈
    </button>
</div>
