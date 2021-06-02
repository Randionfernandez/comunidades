<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Propietarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <x-jet-button href="{{ route('propietario.create') }} class="ml-4" >
                {{ __('Asignar Propietarios') }}
                </x-jet-button>

          <x-jet-button class="ml-4">
            {{ __('Configuración de Propietarios') }}
        </x-jet-button>
    </div>
</div>
</div>
</x-app-layout>