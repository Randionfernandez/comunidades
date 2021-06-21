<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Juntas')
        </h2>
        <hr>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
    </x-slot>

    @include('partials.session-status')

    <x-jet-button onclick="location.href ='{{ route('juntas.create') }}'">@lang('New')</x-jet-button>

    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('Denom')</th>
                        <th>@lang('Tipo')</th>
                        <th>@lang('Solicitante')</th>
                        <th>@lang('Comunidad')</th>
                        <th>@lang('Fecha 1ra')</th>
                        <th>@lang('Hora 1ra')</th>
                        <th class="col-span-2 text-center">@lang('actions')</th>
                    </tr>
                </thead>
                @forelse($juntas as $junta)
                <tbody>
                    <tr>
                        <td>{{$junta->denom_convocatoria}}</td>
                        <td>{{$junta->tipo}}</td>
                        <td>{{$junta->user_id}}</td>
                        <td>{{$junta->comunidad_id}}</td>
                        <td>{{$junta->fecha_primera}}</td>
                        <td>{{$junta->hora_primera}}</td>
                        <td class="flex">
                <x-jet-button class="mx-2" onclick="location.href ='{{ route('juntas.edit', $junta) }}'">{{ __('Edit') }}</x-jet-button>
                <x-jet-danger-button onclick="location.href ='{{ route('juntas.show', $junta) }}'">{{__('Show')}}</x-jet-danger-button>
                </td>
                </tr>
                </tbody>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not juntas created yet'])
                @endforelse
            </table>
        </div>
    </div>

    <x-slot name="js">
        <script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>
        <script>
                        $(document).ready(function() {
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
                        }); });
        </script>
    </x-slot>

</x-app-layout>