<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Listado de cuentas bancarias')
        </h2>
        <hr>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
    </x-slot>

    <a href="{{ route('cuentasBancarias.create') }}" class="btn btn-primary  mx-5 mb-4">Nuevo</a>

    @include('partials.session-status')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th scope="col">Nombre</th>
                        <th scope="col">Pais</th>
                        <th scope="col">DC</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Bic</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($cuentasBancarias as $cuentaBancaria)
                    <tr>
                        <td>{{ $cuentaBancaria-> nombre }}</td>
                        <td>{{ $cuentaBancaria-> pais }}</td>
                        <td>{{ $cuentaBancaria-> dc }}</td>
                        <td>{{ $cuentaBancaria-> cuenta }}</td>
                        <td>{{ $cuentaBancaria-> bic }}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('cuentasBancarias.edit', $cuentaBancaria) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button type="submit" href="#" onclick="document.getElementById('delete-cuenta').submit()">{{__('Delete')}}</x-jet-danger-button>
                        </td>
                        <form class="d-none" id="delete-cuenta" action="{{route('cuentasBancarias.destroy', $cuentaBancaria)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Bank Accounts created yet'])
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>
        <script>
                                $('#buscador').DataTable({
                                    resposive: true,
                                    autoWidth: false,
                                    "language": {
                                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                                        "zeroRecords": "Nada encontrado  - disculpa",
                                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                                        "infoEmpty": "No records available",
                                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                        "search": 'Buscar:',
                                        "paginate": {
                                            "next": "Siguiente",
                                            "previous": "Anterior"
                                        }

                                    }
                                });
        </script>
    </x-slot>

</x-app-layout>