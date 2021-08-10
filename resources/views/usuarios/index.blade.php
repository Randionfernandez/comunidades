@extends('adminlte.layout')

@section('header')
    @include('partials.session-status')
    @include('partials.header')
    @include('partials.btncreate', ['ruta' => 'usuarios.create', 'texto' => 'New'])
@endsection

@section('content')
    @if ($users->count())
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not users of that community created yet'])
    @else
        <table id="tcmd" class="table table-striped table-bordered">
            <thead class="text-center">
                <tr>
                    <th>@lang('Nombre')</th>
                    <th>@lang('Email')</th>
                    <th>@lang('Acción')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="flex border-2 text-center">                        
                            <a class="btn btn-sm btn-info" href="{{ route('usuarios.edit', $user) }}">
                                <i class="far fa-edit size-20"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="{{ route('usuarios.show', $user) }}">
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