<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Proveedores')
        </h2>
        <hr>
    </x-slot>

    @include('partials.session-status')


    <x-jet-button onclick="location.href ='{{ route('proveedores.create') }}'">@lang('New')</x-jet-button>

    @if (! is_null($activeCommunity->proveedor) && $activeCommunity->proveedor->count())
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('nombre')</th>
                        <th>@lang('cif')</th>
                        <th>@lang('email')</th>
                        <th>@lang('telefono')</th>

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
</x-app-layout>

