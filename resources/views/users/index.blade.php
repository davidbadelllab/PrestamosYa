<x-app-layout>
    <div class="flex">
        <div class="w-full">
            <!-- Aquí viene tu lógica condicional -->
            <div>
                @if ($condition)
                    @livewire('user-form')
                @else

            </div>
        </div>
    </div>
</x-app-layout>
