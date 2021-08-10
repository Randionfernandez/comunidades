@extends('layauts/plantilla')

@section('title','Listado de gastos')

@section('content')
<h1 class="text-center mb-4">Listado de gastos</h1>


<a href=""></a>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha</th>
            <th scope="col">Importe</th>
        </tr>
    </thead>
    <tbody>
        @if($gastos->count())
        @foreach($gastos as $gasto)
        <tr>
            <td>{{$gasto->id}}</td>
            <td>{{$gasto->descripcion}}</td>
            <td>{{$gasto->proveedor}}</td>
            <td>{{$gasto->fecha}}</td>
            <td>{{$gasto->importe}}</td>
        </tr>
        @endforeach
        @else
        <tr>
            <td>No hay registros</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection