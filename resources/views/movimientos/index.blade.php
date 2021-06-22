<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Movimientos')
        </h2>
        <hr>
    </x-slot>

    <a href="{{ route('movimientos.create') }}" class="btn btn-primary mx-5 mb-4">Crear</a>

    <a href="{{route('ingresos.index')}}" class="btn btn-success mb-4">Ingresos</a>

    @include('partials.session-status')

    @php $divisa = '€ '; @endphp

    @if($movimientos->count() != 0)
    <div class="card">
        <div class="card-body">

            <table class="table table-hover dt-responsive nowrap" id="buscador">

                
                <thead>
                    <tr class="text-white bg-dark">
                        <th scope="col">Cuenta Corriente</th>
                        <th scope="col">Fecha Valor</th>
                        <th scope="col">Concepto</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Grupo</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($movimientos as $movimiento)
                        <tr>
                            <td>{{$movimiento->cuenta}}</td>
                            <td>{{$movimiento->fechaValor }}</td>
                            <td><b>{{$movimiento->concepto}}</b> {{$movimiento->propiedad}}</td>
                            <td class="@php echo ($movimiento->concepto == 'ingreso') ? 'text-success' : 'text-danger' @endphp">{{$movimiento->cantidad}} {{ $divisa }}</td>
                            <td>{{$movimiento->grupo}}</td>
                           <!-- <td>{{$movimiento->propiedad}}</td>-->
                            @if ($movimiento->concepto != 'ingreso')
                                <td class="flex">

                                    <x-jet-button class="mx-2" onclick="location.href ='{{ route('movimientos.edit',$movimiento->id) }}'">{{ __('Edit') }}</x-jet-button>
                                    <x-jet-danger-button onclick="document.getElementById('delete-movimiento').submit()">{{__('Delete')}}</x-jet-danger-button>
                                    <form class="d-none" id="delete-movimiento" method="POST" action="{{ route('movimientos.destroy',$movimiento->id) }}">
                                        @csrf @method('DELETE')
                                    </form>

                                </td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @empty
                    @endforelse

                <table class="table col-md-3 mx-4" >
                    <thead class="text-white @php echo ($total <= 0) ? 'bg-success' : 'bg-danger' @endphp">
                    <th scope="col" >Total Gastos</th>
                    </thead>

                    <tbody>
                    <td class="@php echo ($total <= 0) ? 'text-success' : 'text-danger' @endphp">{{$total}} {{ $divisa }}</td>
                    </tbody>
                </table>
                </tbody>
            </table>
        </div>
    </div>
    @else
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not transactions created yet'])
    @endif
</x-app-layout>
