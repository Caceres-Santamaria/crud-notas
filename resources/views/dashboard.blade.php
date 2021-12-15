<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notas') }}
        </h2>
        <h2 class="font-semibold text-base text-gray-800 leading-tight">
            Visitas: {{ $visitas }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('nota')
            </div>
        </div>
    </div>
</x-app-layout>
