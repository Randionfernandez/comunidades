<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Crear Propietario
    </h2>
</x-slot>
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <x-jet-form-section submit="store">
        <x-slot name="title">
            {{ __('Información de propietarios') }}
        </x-slot>

      <x-slot name="form">
          <!-- Asigna el propietario al usuario seleccionado con la id y pide que introcuzca la referencia catastral para asociarlo a la propiedad pertinente -->
          <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="ref_ca" value="{{ __('Referencia catastral propiedad') }}" />
            <x-jet-input id="ref_ca" type="text" class="mt-1 block w-full" wire:model.defer="state.ref_ca" autocomplete="off" />
            <x-jet-input-error for="ref_ca" class="mt-2" />
          </div>
          <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="num_cta" value="{{ __('Nº de cuenta') }}" />
            <x-jet-input id="num_cta" type="text" class="mt-1 block w-full" wire:model.defer="state.num_cta" autocomplete="off" />
            <x-jet-input-error for="num_cta" class="mt-2" />
          </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('propietario.create') }}">
                {{ __('¿Quieres agregar el usuario como propietario?') }}
            </a>
        </div>
      <!-- Submit -->
    <x-slot name="actions">
        <x-jet-button class="ml-4" type="submit">
            {{ __('Asignar propietario') }}
        </x-jet-button>
    </x-slot>
       </x-jet-form-section>
  </div>
</x-app-layout>
