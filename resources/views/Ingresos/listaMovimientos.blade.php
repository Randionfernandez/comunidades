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
</x-app-layout>