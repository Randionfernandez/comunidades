<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Distribucion')
        </h2>
        <hr>
    </x-slot>

    <form action="{{ route('distribuciones.store') }}" method="POST">
         @csrf

       @include('distribuciones._form')
    </form>
</x-app-layout>