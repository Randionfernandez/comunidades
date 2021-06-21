<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Editar bancaria')
        </h2>
        <hr>
    </x-slot>
    <form action="{{ route('cuentasBancarias.update',$cuentasBancarias->id) }}" method="POST" >
        @csrf
        @method('PUT')

        @include('CuentaBancaria.form',['btn' => 'Editar'])
    </form>
</x-app-layout>

