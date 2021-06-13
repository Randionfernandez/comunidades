@extends('layauts/plantilla')

@section('title','Cuenta Bancaria')

@section('content')

<h1 class="text-center">Editar bancaria</h1>

@csrf
@method('PUT')

    @include('cuentaBancaria/form',['btn' => 'Editar'])
</form>
@endsection

