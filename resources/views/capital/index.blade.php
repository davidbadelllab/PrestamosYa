
<x-app-layout>
    <div class="flex">
        <div class="w-full">
            <!-- Aquí viene tu lógica condicional -->
            <div>
                @if ($condition)
                    @livewire('capital-form')
                @else
                    <p>No se cumple la condición para mostrar el formulario.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
