@extends('adminlte.layout')
    
    @section('header')
        @include('partials.session-status')
        @include('partials.header', ['title' => 'Tus movimientos'])
        @include('partials.btncreate', ['ruta' => "movimientos.create", 'texto' => 'New'])
        <a href="{{ route('ingresos.index') }}">
            <button class="btn btn-success" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-dollar-sign"></i>  @lang('Ingresos')
            </button>
        </a>
    @endsection
    
    @section('content')
    
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
                            <td><b>{{$movimiento->concepto}}</b> {{$movimiento->nombrePropiedad($movimiento->propiedad_id)}}</td>
                            <td class="@php echo ($movimiento->concepto == 1) ? 'text-success' : 'text-danger' @endphp">{{$movimiento->importe}} {{ $divisa }}</td>
                            <td>{{$movimiento->grupo}}</td>
                           <!-- <td>{{$movimiento->propiedad}}</td>-->
                            @if ($movimiento->concepto != 1)
                                <td class="flex">
                                    <x-jet-button class="mx-2" onclick="location.href ='{{ route('movimientos.edit',$movimiento) }}'">{{ __('Edit') }}</x-jet-button>
                                    <x-jet-danger-button onclick="location.href ='{{ route('movimientos.show', $movimiento) }}'">{{__('Show')}}</x-jet-danger-button>
                                </td>
                            @else
                                <td>
                                    <x-jet-danger-button onclick="location.href ='{{ route('movimientos.show', $movimiento) }}'">{{__('Show')}}</x-jet-danger-button>
                                </td>
                            @endif
                        </tr>
                    @empty
                    @endforelse
                    <div class="row inline-flex">
                        <table class="table col-md-3 mx-4" >
                            <thead>
                            <th scope="col" class="text-white text-center @php echo ($totalGastos <= 0) ? 'bg-success' : 'bg-danger' @endphp">Total Gastos</th>
                            <th scope="col" class="text-white text-center @php echo ($totalIngresos >= 0) ? 'bg-success' : 'bg-danger' @endphp">Total Ingresos</th>
                            <th scope="col" class="text-white text-center @php echo ($totalIngresos-$totalGastos >= 0) ? 'bg-success' : 'bg-danger' @endphp">Total</th>
                            </thead>

                            <tbody>
                            <td class="text-center @php echo ($totalGastos <= 0) ? 'text-success' : 'text-danger' @endphp">{{$totalGastos}} {{ $divisa }}</td>
                            <td class="text-center @php echo ($totalIngresos >= 0) ? 'text-success' : 'text-danger' @endphp">{{$totalIngresos}} {{ $divisa }}</td>
                            <td class="text-center @php echo ($totalIngresos-$totalGastos >= 0) ? 'text-success' : 'text-danger' @endphp">{{$totalIngresos-$totalGastos}} {{ $divisa }}</td>
                            </tbody>
                        </table>
                    </div>
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    @else
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not transactions created yet'])
    @endif
@endsection
