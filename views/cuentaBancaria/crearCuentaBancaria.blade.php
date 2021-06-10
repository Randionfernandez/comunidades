@extends('layauts/plantilla')

@section('title','Cuenta Bancaria')

@section('content')

<h1 class="text-center">Cuenta bancaria</h1>

<form action="{{url('/cuentasBancarias')}}" method="POST" >
@csrf
@method('POST')

    @include('cuentaBancaria/form',['btn' => 'Guardar'])
</form>
@endsection

