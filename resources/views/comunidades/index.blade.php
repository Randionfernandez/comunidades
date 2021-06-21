<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Comunidades')
        </h2>
        <hr>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
    </x-slot>

    @include('partials.session-status')

    @if( $user->comunidades->count() < $user->MaxFreeCommunities)
    <x-jet-button onclick="location.href ='{{ route('comunidades.create') }}'">@lang('New')</x-jet-button>
    @endif

    @if ($user->comunidades->count() > 0)
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('denom')</th>
                        <th>@lang('cif')</th>
                        <th>@lang('direccion')</th>
                        <th>@lang('Fecha Alta')</th>
                        <th>@lang('partes')</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>
                @if(! session()->get('activeCommunity'))
                @php $comunidades = $user->comunidades @endphp
                @else
                @php $comunidades = [session()->get('activeCommunity')] @endphp
                @endif
                @forelse($comunidades as $comunidad )
                <tbody>
                    <tr>
                        <td>{{$comunidad->denom}}</td>
                        <td>{{$comunidad->cif}}</td>
                        <td>{{$comunidad->direccion}}</td>
                        <td>{{$comunidad->fechalta}}</td>
                        <td>{{$comunidad->partes}}</td>
                        <td class="flex">
                            @if (! Session::has('activeCommunity'))
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('comunidades.select', $comunidad) }}'">{{ __('Select') }}</x-jet-button>
                            @endif
                            <x-jet-danger-button onclick="location.href ='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button>
                        </td>
                </tr>
                </tbody>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
                @endforelse
            </table>
        </div>
    </div>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
    @endif

    {{-- $comunidades->links() --}}

    <x-slot name="js">
         <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>
    <script>
            $('#buscador').DataTable({
                resposive:true,
                autoWidth: false,
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado  - disculpa",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search":'Buscar:',
                "paginate": {
                    "next" : "Siguiente",
                    "previous": "Anterior"
                }

        }
            });
    </script>
    </x-slot>
</x-app-layout>