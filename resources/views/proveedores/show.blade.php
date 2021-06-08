<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Community Show | ' . $proveedor->nombre ) }}
        </h2>
    </x-slot>

    <div class="bg-white p-5 shadow rounded">

        <div class="col-12">
            <a class="btn btn-primary" href="{{ route('proveedores.pasarComunidad', Session()->get('activeCommunity')) }}">@lang('Back')</a>

            @auth
            <div class="btn-group btn-group-sm">
                <a class="btn btn-primary" href="{{ route('proveedores.edit', $proveedor) }}">@lang('Edit')</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-proveedor').submit()">@lang('Eliminate')</a>
            </div>
            <form class="d-none" id="delete-proveedor" method="POST" action="{{ route('proveedores.destroy', $proveedor) }}">
                @csrf @method('DELETE')
            </form>
            @endauth
        </div>

        <label for="nombre"><h1>@lang('Name')</h1></label>
        <h1> {{ $proveedor->nombre }} </h1>

        <div class="d-flex justify-content-between align-items-center">
            <div class=" col-12 panel-body">
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cif">@lang('cif')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->cif }} </div>
                        </div>
                    </div>
                 
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tipo">@lang('tipo')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->tipo }} </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="calificacion">@lang('calificacion')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->calificacion }} </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="figura">@lang('figura')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->figura }} </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="calle">@lang('street')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->calle }} </div>
                        </div>
                </div>
                <div class="row form-group">
                    
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="codigopais">@lang('countrycode')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->codigopais }} </div>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cp">@lang('postalcode')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->cp }} </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="pais">@lang('country')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->pais }} </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="provincia">@lang('province')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->provincia }} </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="localidad">@lang('location')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->localidad }} </div>
                        </div>
                    </div>
                       <div class="col-md-4">
                        <div class="form-group">
                            <label for="iban">@lang('iban')</label>
                            <div class="form-control border-0 bg-light shadow-sm"> {{ $proveedor->iban }} </div>
                        </div>
                    </div>
                </div>				
            </div>
        </div>
    </div>
</x-app-layout>