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
        <label for="denominacion" class="form-label">@lang('Denomination')</label>
        <input type="text" id="nombre" name="denominacion" class="form-control" value="{{ old('denominacion', $propiedad->denominacion) }}" oninput="this.value = this.value.toUpperCase()"  {{$btndisabled}} required />
        @error('denominacion')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-4">
        <label for="user_id" class="form-label">@lang('Owner')</label>
        <select class="form-select" aria-label="Default select example" name="user_id" {{$btndisabled}}>
            <option value="0">@lang('Propietarios')</option>
            @forelse($propietarios as $propietario)
            @if ( old('user_id', $propiedad->user_id) == $propietario->id )
            <option value="{{ $propietario->id }}" selected > {{ $propietario->name }} </option>
            @else
            <option value="{{ $propietario->id }}"> {{$propietario->name }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
        @error('user_id')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    
    <div class="col-4">
        <label for="tipo" class="form-label">@lang('Property Type')</label>
        <select class="form-select" aria-label="Default select example" name="tipo" {{$btndisabled}}>
            <option value="">@lang('Tipo Propiedades')</option>
            @forelse($tipoPropiedades as $tipoPropiedad)
            {{$tipoPropiedad}}
            @if ( old('tipo', $propiedad->tipo) == $tipoPropiedad )
            <option value="{{ $tipoPropiedad }}" selected > {{ $tipoPropiedad }} </option>
            @else
            <option value="{{ $tipoPropiedad }}"> {{$tipoPropiedad }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
        @error('tipo')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>

<div class="row form-group">
    <div class="col-4">
        <label for="coeficiente" class="form-label">@lang('Coeficiente')</label>
        <input type="integer" id="coeficiente" name="coeficiente" class="form-control"  value="{{ old('coeficiente', $propiedad->coeficiente) }}"  {{$btndisabled}} required />
        @error('coeficiente')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="parte" class="form-label">@lang('Parte')</label>
        <input type="integer" id="parte" name="parte" class="form-control"  value="{{ old('parte', $propiedad->parte) }}"  {{$btndisabled}} required />
        @error('parte')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="col-4">
        <label for="observaciones" class="form-label">@lang('Observaciones')</label>
        <input type="text" id="observacion" name="observaciones" class="form-control"  value="{{old('observaciones', $propiedad->observaciones)}}"  {{$btndisabled}} />
        @error('observacion')
        <div class="alert alert-danger mb-2" role="alert">
            {{ $message }}
        </div>
        @enderror
    </div>
    <input type="integer" id="activeCommunity" name="comunidad_id" value="{{Session()->get('activeCommunity')->id}}" readonly hidden />
</div>