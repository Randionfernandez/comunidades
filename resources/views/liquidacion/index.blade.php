@extends('layauts/plantilla')

@section('title','Listado de liquidaciones')

@section('content')

    <h1 class="text-center">Listado de liquidaciones</h1>
    <a href="{{ url('liquidacion/create') }}" class="btn btn-primary mx-3">Nuevo</a>

    <table class="table">
        <thead>
           <tr>
            <th scope="col">Id</th>
            <th scope="col">Tipo</th>
            <th scope="col">Desde</th>
            <th scope="col">Hasta</th>
            <th scope="col">Eliminar</th>
           </tr>
        </thead>

        <tbody>
        @if($liquidaciones->count())
            @foreach($liquidaciones as $liquidacion)
                <tr>
                    <td>{{$liquidacion->id}}</td>
                    <td>{{$liquidacion->tipo}}</td>
                    <td>{{$liquidacion->desde}}</td>
                    <td>{{$liquidacion->hasta}}</td>
                    <td>
                    
                <form action="{{ route('liquidacion.destroy', $liquidacion -> id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Borrar</button>
                </form>
                </td>
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
