@csrf

@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('proveedores.pasarComunidad', Session()->get('activeCommunity')) }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
    <a class="btn btn-primary" href="{{ route('proveedores.edit', $proveedor) }}">@lang('Edit')</a>
    <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-seleccion').submit()">@lang('Delete')</a>
    <a class="btn btn-secondary text-white" href='{{ route('proveedores.pasarComunidad', Session()->get('activeCommunity')) }}'>@lang('Back')</a>
    <form class="d-none" id='delete-seleccion' method="POST" action="{{ route('proveedores.destroy', $proveedor) }}">
        @csrf @method('DELETE')
    </form>
</div>
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row form-group">
    <div class="col-4">
        <label for="nombre">@lang('nombre')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="nombre" placeholder=@lang('nombre') value="{{ old('nombre', $proveedor->nombre) }}" {{$btndisabled}} required>
        @if ($errors->has('nombre'))
        <span class="error-message">{{ $errors->first('nombre') }}</span>
        @endif
    </div>
    <div class="col-4">
        <label for="apellido1">@lang('apellido1')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="apellido1" placeholder=@lang('apellido1') value="{{ old('apellido1', $proveedor->apellido1) }}" {{$btndisabled}}>
        @if ($errors->has('apellido1'))
        <span class="error-message">{{ $errors->first('apellido1') }}</span>
        @endif
    </div>
    <div class="col-4">
        <label for="apellido2">@lang('apellido2')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="apellido2" placeholder=@lang('apellido2') value="{{ old('apellido2', $proveedor->apellido2) }}" {{$btndisabled}}>
        @if ($errors->has('apellido2'))
        <span class="error-message">{{ $errors->first('apellido2') }}</span>
        @endif
    </div>
</div>

<div class="row form-group">
    <div class="col-6">
        <div class="form-group">
            <label for="email">@lang('email')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="email" name="email" min="1" placeholder=@lang('email') value="{{ old('email', $proveedor->email) }}" {{$btndisabled}}>
        </div>
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="telefono">@lang('telefono')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" name="telefono" min="1" placeholder=@lang('telefono') value="{{ old('telefono', $proveedor->telefono) }}" {{$btndisabled}} required>
        </div>
    </div>
</div>


<div class="row form-group">
    <div class="col-6">
        <label for="fechalta">@lang('Create Date')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechalta" placeholder=@lang('fechalta') value="{{ old('fechalta', $proveedor->fechalta) }}" {{$btndisabled}} required>
    </div>
    <div class="col-6">
        <label for="cif">@lang('cif')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="9" name="cif" placeholder=@lang('cif') value="{{ old('cif', $proveedor->cif) }}" {{$btndisabled}} required>
    </div>
</div>
<div class="row form-group">
    <div class="col-4">
        <select class="form-select" aria-label="Default select example" name="tipo" {{$btndisabled}}>
            <option value="0">@lang('Type')</option>
            @forelse($tipos as $tipo)
            @if ( old('tipo', $proveedor->tipo) == $tipo->id )
            <option value="{{ $tipo->id }}" selected > {{ $tipo->nombreTipo }} </option>
            @else
            <option value="{{ $tipo->id }}"> {{ $tipo->nombreTipo }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
    </div>
    <div class="col-4">
        <select class="form-select" aria-label="Default select example" name="calificacion" {{$btndisabled}}>
            <option value="0">@lang('Calification')</option>
            @forelse($calificaciones as $calificacion)
            @if ( old('calificacion', $proveedor->calificacion) == $calificacion->id )
            <option value="{{ $calificacion->id }}" selected > {{ $calificacion->nombreCalificacion }} </option>
            @else
            <option value="{{ $calificacion->id }}"> {{ $calificacion->nombreCalificacion }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
    </div>
    <div class="col-4">
        <select class="form-select" aria-label="Default select example" name="figura" {{$btndisabled}}>
            <option value="0">@lang('Figure')</option>
            @forelse($figuras as $figura)
            @if ( old('figura', $proveedor->figura) == $figura->id )
            <option value="{{ $figura->id }}" selected > {{ $figura->nombreFigura }} </option>
            @else
            <option value="{{ $figura->id }}"> {{ $figura->nombreFigura }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
    </div>
</div>

<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications address')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="calle">@lang('calle')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="calle" placeholder=@lang('calle') value="{{ old('calle', $proveedor->calle) }}" {{$btndisabled}}>
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-4">
                <label for="pais">@lang('Country')</label>
                <select class="form-select" aria-label="Default select example" name="pais" {{$btndisabled}}>
                    <option value="0">@lang('Country')</option>
                    @forelse($paises as $pais)
                    @if ( old('pais', $proveedor->pais) == $pais->id )
                    <option value="{{ $pais->id }}" selected > {{ $pais->nombrePais }} </option>
                    @else
                    <option value="{{ $pais->id }}"> {{ $pais->nombrePais }} </option>
                    @endif
                    @empty
                    <p>No hay paises</p>
                    @endforelse
                </select>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="provincia">@lang('provincia')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="provincia" placeholder=@lang('provincia') value="{{ old('provincia', $proveedor->provincia) }}" {{$btndisabled}} required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="localidad">@lang('localidad')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="localidad" placeholder=@lang('localidad') value="{{ old('localidad', $proveedor->localidad) }}" {{$btndisabled}} required>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="codigopais">@lang('codigopais')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="codigopais" placeholder=@lang('codigopais') value="{{ old('codigopais', $proveedor->codigopais) }}" {{$btndisabled}} required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="cp" placeholder=@lang('cp') value="{{ old('cp', $proveedor->cp) }}" {{$btndisabled}} required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="iban">@lang('Iban')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="iban" placeholder=@lang('iban') value="{{ old('iban', $proveedor->iban) }}" {{$btndisabled}} required>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>