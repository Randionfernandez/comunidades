<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Listado de movimientos de') {{__($propiedad)}}
        </h2>
        <hr>
    </x-slot>

<a href="{{route('ingreso.index')}}" class="btn btn-primary mx-5 mb-4">Volver</a>

    <table class="table col-md-11 mx-5">
        <tr class="text-white bg-dark">
            <th colspan="col">Concepto</th>
            <th colspan="col">Cantidad</th>
            <th colspan="col"> Ingresado</th>
            <th colspan="col">Saldo</th>

        </tr>
        <tbody>
        
        

            @foreach ($prueba as $dato)
                <tr>
                    <td>{{$dato['concepto']}}</td>
                    <td>{{$dato['operacion']}}</td>
                    <td>{{$dato['ingresado']}}</td>
                    <td>{{$dato['restante']}}</td>
                </tr>
            @endforeach

           
                
        <table class="table col-md-1 mx-5" >
            <thead class="text-white bg-dark"  >
                <th scope="col">Total</th>
            </thead>

            <tbody >
              <!--<td>{{$total}}</td>-->
                <td>{{$dato['restante']}}</td>
            
          </tbody>
      </table>

        </tbody>
    </table>
</x-app-layout>
