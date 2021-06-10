@extends('layauts/plantilla')

@section('title','Ficha del mivimiento')

@section('content')
<h1 class="text-center">Ficha del movimiento</h1>

<form action="{{ route('movimientos.store') }}" method="POST">
    @csrf
    @method('POST')
    @include('movimientos/__form')
</form>
@endsection
