<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Proveedores')
        </h2>
        <hr>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
    </x-slot>

    @include('partials.session-status')


    <x-jet-button onclick="location.href ='{{ route('proveedores.create') }}'">@lang('New Provider')</x-jet-button>

    @if ($activeCommunity->proveedor->count() > 0)
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('nombre')</th>
                        <th>@lang('cif')</th>
                        <th>@lang('email')</th>
                        <th>@lang('telefono')</th>
                        <th>@lang('tipo')</th>
                        <th>@lang('calificacion')</th>

                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($activeCommunity->proveedor as $proveedor)
                    <tr>
                        <td>{{$proveedor->nombre}}</td>
                        <td>{{$proveedor->cif}}</td>
                        <td>{{$proveedor->email}}</td>
                        <td>{{$proveedor->telefono}}</td>
                        <td>{{$proveedor->nombreTipo($proveedor->id)}}</td>
                        <td>{{$proveedor->nombreCalificacion($proveedor->id)}}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('proveedores.edit', $proveedor) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button onclick="location.href ='{{ route('proveedores.show', $proveedor) }}'">{{__('Show')}}</x-jet-danger-button>
                        </td>
                    </tr>
                    @empty
                    @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay proveedores para esta comunidad'])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay proveedores para esta comunidad'])
    @endif

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

