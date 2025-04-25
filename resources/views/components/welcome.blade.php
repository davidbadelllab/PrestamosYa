<x-app-layout>
<div class="flex-grow bg-gradient-to-br from-gray-100 to-gray-300 dark:bg-gray-900 p-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Contenedor Principal -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Deudores -->
            <div class="bg-gradient-to-r from-green-400 to-green-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Deudores</h3>
                <p class="text-6xl mt-4">{{ $totalDeudores }}</p>
                <p class="mt-2">Total de deudores activos</p>
            </div>

            <!-- Avales -->
            <div class="bg-gradient-to-r from-blue-400 to-blue-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Avales</h3>
                <p class="text-6xl mt-4">{{ $totalAvales }}</p>
                <p class="mt-2">Total de avales registrados</p>
            </div>

            <!-- Ganancias Totales -->
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Ganancias Totales</h3>
                <p class="text-6xl mt-4">${{ number_format($totalGanancias, 2) }}</p>
                <p class="mt-2">Ganancias obtenidas hasta la fecha</p>
            </div>

            <!-- Préstamos Próximos a Pagar -->
            <div class="bg-gradient-to-r from-purple-400 to-purple-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Próximos Pagos</h3>
                <p class="text-6xl mt-4">{{ $proximosPagos }}</p>
                <p class="mt-2">Préstamos cercanos a la fecha de pago</p>
            </div>

            <!-- Deudas Pagadas -->
            <div class="bg-gradient-to-r from-teal-400 to-teal-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Deudas Pagadas</h3>
                <p class="text-6xl mt-4">{{ $deudasPagadas }}</p>
                <p class="mt-2">Préstamos completamente pagados</p>
            </div>

            <!-- Deudas en Mora -->
            <div class="bg-gradient-to-r from-red-400 to-red-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Deudas en Mora</h3>
                <p class="text-6xl mt-4">{{ $deudasMora }}</p>
                <p class="mt-2">Préstamos en situación de mora</p>
            </div>

            <!-- Total de Deudas -->
            <div class="bg-gradient-to-r from-pink-400 to-pink-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Total de Deudas</h3>
                <p class="text-6xl mt-4">{{ $totalDeudas }}</p>
                <p class="mt-2">Total de préstamos activos</p>
            </div>

            <!-- Aumento de Capital -->
            <div class="bg-gradient-to-r from-indigo-400 to-indigo-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Aumento de Capital</h3>
                <p class="text-6xl mt-4">${{ number_format($aumentoCapital, 2) }}</p>
                <p class="mt-2">Incremento de capital hasta la fecha</p>
            </div>

            <!-- Capital Inicial -->
            <div class="bg-gradient-to-r from-orange-400 to-orange-500 text-white p-6 rounded-lg shadow-xl">
                <h3 class="text-3xl font-semibold">Capital Inicial</h3>
                <p class="text-6xl mt-4">${{ number_format($capitalInicial, 2) }}</p>
                <p class="mt-2">Capital inicial registrado</p>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
