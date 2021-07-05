@csrf

@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('propiedades.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
@include('partials.btneditdeleteback', ['route1' => 'propiedades.edit', 'variable' => $propiedad, 'route2' => 'propiedades.index', 'route3' => 'propiedades.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row form-group">
    
    <div class="col-4">
        <label for="nombre" class="form-label">Nombre</label>
        <input required type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"/>
        @error('nombre')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-4">
        <label for="propietario" class="form-label">@lang('Owner')</label>
        <input required type="text" id="propietario" name="propietario" class="form-control"  value="{{ old('propietario') }}"/>
        @error('propietario')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-4">
        <label for="tipoPropiedad" class="form-label">@lang('Property Type')</label>
        <select class="form-select" aria-label="Default select example" name="tipoPropiedad" {{$btndisabled}}>
            <option value="0">@lang('Tipo Propiedades')</option>
            @forelse($tipoPropiedades as $tipoPropiedad)
            @if ( old('tipoPropiedad', $propiedad->tipoPropiedad) == $tipoPropiedad->id )
            <option value="{{ $tipoPropiedad->id }}" selected > {{ $tipoPropiedad->nombreTipoPropiedad }} </option>
            @else
            <option value="{{ $tipoPropiedad->id }}"> {{$tipoPropiedad->nombreTipoPropiedad }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
        @error('tipoPropiedad')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-4">
        <label for="coeficiente" class="form-label">@lang('Coeficiente')</label>
        <input required type="integer" id="coeficiente" name="coeficiente" class="form-control"  value="{{ old('coeficiente') }}"/>
        @error('coeficiente')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="parte" class="form-label">@lang('Parte')</label>
        <input required type="integer" id="parte" name="parte" class="form-control"  value="{{ old('parte') }}"/>
        @error('parte')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="observacion" class="form-label">@lang('Observaciones')</label>
        <input type="text" id="observacion" name="observacion" class="form-control"  value="{{ old('observacion') }}"/>
        @error('observacion')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>