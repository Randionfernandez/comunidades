@extends('adminlte.layout')

@section('header')
    @include('partials.session-status')
    @include('partials.header', ['title' => 'Tus proveedores'])
    @include('partials.btncreate', ['ruta' => "proveedores.create", 'texto' => 'New'])
@endsection

@section('content')

@section('content')
    @if (! is_null($cmd_seleccionada->proveedor) && ! $cmd_seleccionada->proveedor->count())
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not provider created yet'])
    @else
    <table id="tcmd" class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>@lang('nombre')</th>
                <th>@lang('cif')</th>
                <th>@lang('email')</th>
                <th>@lang('telefono')</th>
                <th>@lang('Acción')</th>
            </tr>
        </thead>
        <tbody>
            @forelse($cmd_seleccionada->proveedor as $proveedor)
            <tr>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->doi}}</td>
                <td>{{$proveedor->email}}</td>
                <td>{{$proveedor->telefono1}}</td>
                <td class="flex border-2 text-center">                        
                    <a class="btn btn-sm btn-info" href="{{ route('proveedores.edit', $proveedor->id) }}">
                        <i class="far fa-edit size-20"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('proveedores.show', $proveedor) }}">
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