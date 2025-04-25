<div class="grid grid-cols-1 gap-6">
    <div>
        <label for="prestamo_id" class="block text-sm font-medium text-gray-700">Préstamo</label>
        <select id="prestamo_id" name="prestamo_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">Seleccione un préstamo</option>
            @foreach($prestamos as $prestamo)
                <option value="{{ $prestamo->id }}" {{ (isset($pago) && $pago->prestamo_id == $prestamo->id) ? 'selected' : '' }}>
                    Préstamo #{{ $prestamo->id }} - {{ $prestamo->deudor->nombre_completo }}
                </option>
            @endforeach
        </select>
        @error('prestamo_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="monto" class="block text-sm font-medium text-gray-700">Monto</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">$</span>
            </div>
            <input type="number" step="0.01" name="monto" id="monto" 
                class="mt-1 block w-full pl-7 pr-12 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                value="{{ isset($pago) ? $pago->monto : old('monto') }}">
        </div>
        @error('monto')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="fecha_pago" class="block text-sm font-medium text-gray-700">Fecha de Pago</label>
        <input type="datetime-local" name="fecha_pago" id="fecha_pago" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            value="{{ isset($pago) ? $pago->fecha_pago->format('Y-m-d\TH:i') : old('fecha_pago') }}">
        @error('fecha_pago')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="metodo_pago" class="block text-sm font-medium text-gray-700">Método de Pago</label>
        <select id="metodo_pago" name="metodo_pago" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="efectivo" {{ (isset($pago) && $pago->metodo_pago == 'efectivo') ? 'selected' : '' }}>Efectivo</option>
            <option value="transferencia" {{ (isset($pago) && $pago->metodo_pago == 'transferencia') ? 'selected' : '' }}>Transferencia</option>
        </select>
        @error('metodo_pago')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="estado" class="block text-sm font-medium text-gray-700">Estado</label>
        <select id="estado" name="estado" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="pendiente" {{ (isset($pago) && $pago->estado == 'pendiente') ? 'selected' : '' }}>Pendiente</option>
            <option value="completado" {{ (isset($pago) && $pago->estado == 'completado') ? 'selected' : '' }}>Completado</option>
        </select>
        @error('estado')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div id="numero_transaccion_container" style="{{ (isset($pago) && $pago->metodo_pago == 'efectivo') ? 'display: none;' : '' }}">
        <label for="numero_transaccion" class="block text-sm font-medium text-gray-700">Número de Transacción</label>
        <input type="text" name="numero_transaccion" id="numero_transaccion" 
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            value="{{ isset($pago) ? $pago->numero_transaccion : old('numero_transaccion') }}">
        @error('numero_transaccion')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
</div>

<script>
document.getElementById('metodo_pago').addEventListener('change', function() {
    var container = document.getElementById('numero_transaccion_container');
    if (this.value === 'transferencia') {
        container.style.display = 'block';
    } else {
        container.style.display = 'none';
        document.getElementById('numero_transaccion').value = '';
    }
});
</script> 