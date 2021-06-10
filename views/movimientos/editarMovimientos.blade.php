@extends('layauts/plantilla')

@section('title','Editar Movimientos')
@section('content')
<h1 class="text-center">Editar Movimientos</h1>



<form action="{{ route('movimientos.update',$fran->id) }}" method="POST">
    @csrf
    @method('PUT')
    @include('movimientos/__form')
</form>
@endsection