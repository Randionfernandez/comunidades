@extends('adminlte.layout')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Lista propietarios del grupo') {{__($propietarios[0]['name'])}}
        </h2>
        <hr>
    @endsection
@section('title','listaPropietarios')

@section('content')


<h1 class="text-center mb-4"></h1>

<a href="{{route('distribuciones.index')}}" class="btn btn-primary mx-5 mb-4">Volver</a>

<table class="table col-md-11 mx-5">
    <thead>
        <tr class="text-white bg-dark">
            <th scope="col">Propiedad</th>
          
           @if ($propietarios[0]['name']  == 'unidadRegistral')
               <th>UnidadRegistral</th>
           @else
               <th>Coeficiente</th>
           @endif  
            
        </tr>
    </thead>

    <tbody>
        
       @if($propietarios->count())       
        @foreach ($propietarios as $propietario)
           
            <tr>
                <td>{{$propietario->propiedad_id}}</td>
                <td>{{$propietario->coeficiente}}</td>
            </tr>
          
        @endforeach
        
        @else
            <tr>
                <td>No hay Registros</td>
                
            </tr>    
        @endif
    </tbody>
</table>

@endsection


