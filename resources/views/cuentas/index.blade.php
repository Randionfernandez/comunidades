@extends('adminlte.layout')

@section('header')
    @include('partials.session-status')
    @include('partials.header')
    @include('partials.btncreate', ['ruta' => 'cuentas.create', 'texto' => 'New'])
@endsection

@section('content')
    @if (! $cuentas->count())
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not accounts created yet'])
    @else
        <table id="tcmd" class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th scope="col">@lang('Banca')</th>
                    <th scope="col">@lang('Cuenta')</th>
                    <th scope="col">@lang('Bic')</th>
                    <th scope="col">@lang('Saldo')</th>
                    <th>@lang('Acción')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->siglas }}</td>
                        <td>{{ $cuenta->iban }}</td>
                        <td>{{ $cuenta->bic }}</td>
                        <td>{{ $cuenta->saldo }}</td>
                        <td class="flex border-2 text-center">                        
                            <a class="btn btn-sm btn-info" href="{{ route('cuentas.edit', $cuenta) }}">
                                <i class="far fa-edit size-20"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{ route('cuentas.show', $cuenta) }}">
                                <i class="fas fa-search"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                @endforelse
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