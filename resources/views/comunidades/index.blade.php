@extends('adminlte.layout')

@section('header')
    @include('partials.session-status')
    @include('partials.header', ['title' => 'Tus comunidades'])
    @if( $user->comunidades->count() < $user->MaxFreeCommunities)
        @include('partials.btncreate', ['ruta' => 'comunidades.create', 'texto' => 'Crear comunidad'])
    @endif
@endsection

@section('content')

    @if (!count( $comunidades ))
    <div class="alert alert-danger">@lang('There are not communities created yet')</div>
    @else
    <table id="tcmd" class="table table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>@lang('CP')</th>
                <th>@lang('CIF')</th>
                <th>@lang('Activa')</th>
                <th>@lang('Gratuita')</th>
                <th>@lang('Denominación')</th>
                <th>@lang('Acción')</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($comunidades as $comunidad)
            <tr>
                <td>{{ $comunidad->cp }}</td> 
                <td>{{ $comunidad->cif }}</td>
                <td>@if ( $comunidad->activa ) @lang('Sí') @else @lang('No') @endif</td>
                <td>@if ( $comunidad->gratuita ) {{ __('Sí') }} @else {{ __('No') }} @endif</td>
                <td>{{ $comunidad->denom }}</td>

                <td class="flex border-2 text-center">

                    <!-- Seleccionar comunidad -->
                    <!-- ponemos el icono (X o check) y el color de fondo dependiendo de si la comunidad está seleccionada o no -->
                    @php
                        if(session()->get('cmd_seleccionada')) {
                            $bg = 'danger';
                            $icon = 'times';
                        } else {
                            $bg = 'success';
                            $icon = 'check';
                        }
                    @endphp
                        
                    <a class="btn btn-sm btn-{{$bg}}" href="{{ route('comunidades.seleccionar',['comunidad' => $comunidad ])}}">
                        <span class="fa fa-{{$icon}}-circle"></span>
                    </a>

                </td> 

            </tr>
            @endforeach

        </tbody>
    </table>

@endif

@endsection

<!--@section('datatables')
<script>
    $(document).ready(function () {
        $('#tcmd').DataTable();
    });
</script>
@endsection-->

@push('scripts')
<script>
    $(document).ready(function () {
//    $(function () {
//        $('#tcmd').DataTable({
//            "responsive": true,
//            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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