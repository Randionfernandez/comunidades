<x-app-layout>
    
    @include('partials.session-status')


    <x-jet-button onclick="location.href ='{{ route('proveedores.create') }}'">@lang('New Provider')</x-jet-button>

    @if ($activeCommunity->proveedor->count() > 0)
    <table class="table table-fluid">
        <thead>
            <tr>
                <th>@lang('nombre')</th>
                <th>@lang('cif')</th>
                <th>@lang('email')</th>
                <th>@lang('telefono')</th>
                <th>@lang('tipo')</th>
                <th>@lang('calificacion')</th>
                
                <th class="col-span-2">@lang('Actions')</th>
            </tr>
        </thead>
        @forelse($activeCommunity->proveedor as $proveedor)
        <tbody>

            <tr>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->cif}}</td>
                <td>{{$proveedor->email}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td>{{$proveedor->nombreTipo($proveedor->id)}}</td>
                <td>{{$proveedor->nombreCalificacion($proveedor->id)}}</td>
                <td class="flex border-0">
                    <x-jet-button class="mx-2" onclick="location.href ='{{ route('proveedores.edit', $proveedor) }}'">{{ __('Edit') }}</x-jet-button>
                    <x-jet-danger-button onclick="location.href ='{{ route('proveedores.show', $proveedor) }}'">{{__('Show')}}</x-jet-danger-button>
                </td>
            </tr>

        </tbody>
        @empty
        <div class="alert alert-danger">@lang('No hay proveedores para esta comunidad')</div>
        @endforelse
    </table>
    @else
    <h1>@lang('No hay proveedores para esta comunidad todavía')</h1>
    @endif
</x-app-layout>

