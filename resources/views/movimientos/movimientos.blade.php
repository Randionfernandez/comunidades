@extends('layauts/plantilla')

@section('title','Movimientos')

@section('content')

<h1 class="text-center">Movimientos</h1>

<a href="{{ route('movimientos.create') }}" class="btn btn-primary mx-5 mb-4">Crear</a>

<!--<a href="{{route('ingreso.index')}}" class="btn btn-primary  mb-4">Ingresos</a>-->
<a href="{{route('ingreso.index')}}" class="btn btn-primary  mb-4">Ingresos</a>

<table class="table col-md-11 mx-5">

  @if (session ('mensaje'))
    <div class="alert alert-success  alert-dismissible fade show" role="alert">
      {{ session('mensaje') }}
      
    </div>
  @endif

    <thead>
        <tr class="text-white bg-dark">
            <th scope="col">Id</th>
            <th scope="col">Fecha Alta</th>
            <th scope="col">Cuenta Corriente</th>
            <th scope="col">Fecha Valor</th>
            <th scope="col">Concepto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Observaciones</th>
            <!--<th scope="col">Distribucion</th>-->
            <th scope="col">Grupo</th>
            <!--<th scope="col">Propiedad</th>-->
            <th scope="col">Opciones</th>
        </tr>
    </thead>
    <tbody>
      @if($movimientos->count())
        @foreach($movimientos as $movimiento)
        <tr>
            <td>{{$movimiento->id}}</td>
            <td>{{$movimiento->fechaAlta}}</td>
            <td>{{$movimiento->cuenta}}</td>
            <td>{{$movimiento->fechaValor }}</td>
            <td>{{$movimiento->concepto}} {{$movimiento->propiedad}}</td>
            <td>{{$movimiento->cantidad}}</td>
            <td>{{$movimiento->observaciones}}</td>
            <!--<td>{{$movimiento->distribucion}}</td>-->
            <td>{{$movimiento->grupo}}</td>
           <!-- <td>{{$movimiento->propiedad}}</td>-->
            <td>
              @if ($movimiento->concepto != 'ingreso')              
              <a href="{{route('movimientos.edit',$movimiento->id)}}" class="btn btn-dark btn-sm">Editar</a>

              <form action="{{route('movimientos.destroy',$movimiento->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
              </form>
              @endif
               </td>
        </tr>
      @endforeach

      <table class="table col-md-1 mx-5" >
          <thead class="text-white bg-dark" >
            <th scope="col">Total</th>
            
          </thead>

          <tbody >
            <td>{{$total}}</td>
          </tbody>
      </table>
      

      @else
      <tr>
        <td>No hay registros que mostrar</td>
      </tr>
      @endif
    </tbody>
</table>
@endsection
