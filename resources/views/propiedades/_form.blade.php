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

<label for="nombre" class="form-label">Nombre</label>
<input required type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"/>

@error('nombre')
<div class="alert alert-danger mb-2" role="alert">
    {{ $message }}
</div>
@enderror

<label for="propietario" class="form-label">Propietario</label>
<input required type="text" id="propietario" name="propietario" class="form-control"  value="{{ old('propietario') }}"/>

@error('propietario')
<div class="alert alert-danger mb-2" role="alert">
    {{ $message }}
</div>
@enderror

<label for="tipo" class="form-label">Tipo de propiedad</label>
<select required class="form-select form-select-sm" id="tipo" name="tipo"   value="{{ old('tipo') }}">
    <option value="local">Local</option>
    <option value="piso">Piso</option>
    <option value="atico">Atico</option>
</select>

@error('tipo')
<div class="alert alert-danger mb-2" role="alert">
    {{ $message }}
</div>
@enderror

<label for="coeficiente" class="form-label">Coeficiente</label>
<input required type="integer" id="coeficiente" name="coeficiente" class="form-control"  value="{{ old('coeficiente') }}"/>

@error('coeficiente')
<div class="alert alert-danger mb-2" role="alert">
    {{ $message }}
</div>
@enderror

<label for="parte" class="form-label">Parte</label>
<input required type="text" id="parte" name="parte" class="form-control"  value="{{ old('parte') }}"/>

@error('parte')
<div class="alert alert-danger mb-2" role="alert">
    {{ $message }}
</div>
@enderror

<label for="observacion" class="form-label">Observaciones</label>
<input type="text" id="observacion" name="observacion" class="form-control"  value="{{ old('observacion') }}"/>