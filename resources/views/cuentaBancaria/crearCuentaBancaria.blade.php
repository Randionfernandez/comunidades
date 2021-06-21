<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Cuenta Bancaria')
        </h2>
        <hr>
    </x-slot>

@include('partials.session-status')

<form action="{{url('/cuentasBancarias')}}" method="POST" >
@csrf
@method('POST')

    @include('cuentaBancaria.form',['btn' => 'Guardar'])
</form>
</x-app-layout>

