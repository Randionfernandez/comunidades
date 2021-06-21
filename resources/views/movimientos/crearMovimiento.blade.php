<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Ficha del movimiento')
        </h2>
        <hr>
    </x-slot>

    <form action="{{ route('movimientos.store') }}" method="POST">
        @csrf
        @method('POST')
        @include('movimientos._form')
    </form>
</x-app-layout>
