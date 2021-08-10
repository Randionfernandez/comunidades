@extends('adminlte.layout')

@section('header')
    @include('partials.session-status')
    @include('partials.header', ['title' => 'Tus juntas'])
    @include('partials.btncreate', ['ruta' => "juntas.create", 'texto' => 'New'])
@endsection

@section('content')
    @if (! $juntas->count())
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not juntas created yet'])
    @else
    <table id="tcmd" class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>@lang('Denom')</th>
                <th>@lang('Tipo')</th>
                <th>@lang('Solicitante')</th>
                <th>@lang('Comunidad')</th>
                <th>@lang('Fecha 1ra')</th>
                <th>@lang('Hora 1ra')</th>
                <th>@lang('Acción')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($juntas as $junta)
            <tr>
                <td>{{$junta->denominacion}}</td>
                <td>{{$junta->tipo}}</td>
                <td>{{$junta->nombreSolicitante($junta->user_id)}}</td>
                <td>{{$junta->nombreComunidad($junta->comunidad_id)}}</td>
                <td>{{$junta->fechaprimera}}</td>
                <td>{{$junta->horaprimera}}</td>

                <td class="flex border-2 text-center">                        
                    <a class="btn btn-sm btn-info" href="{{ route('juntas.edit', $junta->id) }}">
                        <i class="far fa-edit size-20"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('juntas.show', $junta) }}">
                        <i class="fas fa-search"></i>
                    </a>
                </td> 

            </tr>
            @endforeach

        </tbody>
    </table>

@endif

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,
        });
    });
</script>
@endpush