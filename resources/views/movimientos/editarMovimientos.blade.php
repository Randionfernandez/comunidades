<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Editar Movimientos')
        </h2>
        <hr>
    </x-slot>

    @include('partials.session-status')

    <form action="{{ route('movimientos.update',$fran->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('movimientos._form')
    </form>
</x-app-layout>