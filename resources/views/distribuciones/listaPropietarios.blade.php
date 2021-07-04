@extends('layauts/plantilla')
@section('title','listaPropietarios')

@section('content')


<h1 class="text-center mb-4">Lista propietarios del grupo {{$propietarios[0]['nombre']}}</h1>

<a href="{{route('distribuciones.index')}}" class="btn btn-primary mx-5 mb-4">Volver</a>

<table class="table col-md-11 mx-5">
    <thead>
        <tr class="text-white bg-dark">
            <th scope="col">Propiedad</th>
            <th scope="col">Coeficiente</th>
            
            
        </tr>
    </thead>

    <tbody>
        
       @if($propietarios->count())       
        @foreach ($propietarios as $propietario)
           
            <tr>
                <td>{{$propietario->propiedad}}</td>
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


