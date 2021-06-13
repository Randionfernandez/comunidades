@extends('layauts/plantilla')

@section('title','Listado de liquidaciones')

@section('content')

<h1 class="text-center mb-4">Listado de movimientos de {{$propiedad}}</h1>

<a href="{{route('ingreso.index')}}" class="btn btn-primary mx-5 mb-4">Volver</a>

    <table class="table col-md-11 mx-5">
        <tr class="text-white bg-dark">
            <th colspan="col">Concepto</th>
            <th colspan="col">Cantidad</th>
            <th colspan="col"> Ingresado</th>
            <th colspan="col">Saldo</th>

        </tr>
        <tbody>
        
        @if ($prueba)
            
       
            @foreach ($prueba as $dato) 
                <tr>
                    <!--{{dd($dato)}}-->
                    <td>{{$dato['concepto']}}</td>
                    <td>{{$dato['operacion']}}</td>
                    <td>{{$dato['ingresado']}}</td>
                    <td>{{$dato['restante']}}</td>
                </tr>
            @endforeach
            @else
                <td>No hay movimientos</td>
            @endif
           
                
        <table class="table col-md-1 mx-5" >
            <thead class="text-white bg-dark"  >
                <th scope="col">Total</th>
            </thead>

            <tbody >
               @if ($prueba)
               <td>{{$dato['restante']}}</td>
               @endif
          </tbody>
      </table>

        </tbody>
    </table>
@endsection