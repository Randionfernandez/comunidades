@extends('adminlte.layout')

@section('header')
        @include('partials.session-status')
        @include('partials.header', ['title' => 'Lista de Ingresos'])
        @include('partials.btncreate', ['ruta' => 'ingresos.create', 'texto' => 'New'])
    @endsection

@section('content')

<a href="{{route('movimientos.index')}}" class="btn btn-danger mx-5 mb-4">Volver</a>
@if ($ingresos->count())

@include('partials.session-status')

<table class="table col-md-11 mx-5">
    <thead class="text-white bg-dark">
        <tr>
            <th scope="col">@lang('Fecha Alta')</th>
            <th scope="col">@lang('Cuenta')</th>
            <th scope="col">@lang('Fecha Valor')</th>
            <th scope="col">@lang('Cantidad')</th>
            <th scope="col">@lang('Propiedad')</th>
            <th scope="col">@lang('Lista de gastos')</th>
        </tr>
    </thead>

    <tbody>
        @if ($ingresos->count())
        @foreach ($ingresos as $ingreso)

        <tr>
            <td>{{$ingreso->fechaAlta}}</td>
            <td>{{$ingreso->cuenta}}</td>
            <td>{{$ingreso->fechaValor}}</td>
            <td>{{$ingreso->cantidad}}</td>
            <td>{{$ingreso->propiedad}}</td>
            <td>
                <a href="{{route('ingresos.show', $ingreso)}}" type="submit" name="propiedad" value="{{$ingreso->propiedad}}" class="btn btn-info">Gastos</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@else
@include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not incomings created yet'])
@endif

@endsection

