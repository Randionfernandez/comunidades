@extends('adminlte.layout')

    @section('header')        
        @include('partials.session-status')
        @include('partials.header', ['title' => 'Tus propiedades'])
        @if( $comunidad->propiedades()->count() < $comunidad->partes)
            @include('partials.btncreate', ['ruta' => "propiedades.create", 'texto' => 'New'])
        @endif
    @endsection

@section('content')
    @if (! $propiedades->count())
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not properties created yet'])
    @else
    <table id="tcmd" class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Owner')</th>
                <th>@lang('Acción')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($propiedades as $propiedad)
            <tr>
                <td>{{$propiedad->denominacion}}</td>
                <td>{{$propiedad->nombrePropietario($propiedad)}}</td>

                <td class="flex border-2 text-center">                        
                    <a class="btn btn-sm btn-info" href="{{ route('propiedades.edit', $propiedad->id) }}">
                        <i class="far fa-edit size-20"></i>
                    </a>
                    <a class="btn btn-sm btn-danger" href="{{ route('propiedades.show', $propiedad) }}">
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