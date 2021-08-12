@csrf

@if($btndisabled != 'disabled')
@include('partials.btneditback', ['ruta' => 'propiedades.index'])
@else
@include('partials.btneditdeleteback', ['route1' => 'propiedades.edit', 'variable' => $propiedad, 'route2' => 'propiedades.index', 'route3' => 'propiedades.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="denominacion"> @lang('Denomination') </label>
            <input type="text" name="denominacion" maxlength="10" class="form-control" placeholder="@lang('Denomination...')" value="{{ old('denominacion', $propiedad->denominacion) }}" oninput="this.value = this.value.toUpperCase()" {{$btndisabled}} required>
            @if ($errors->has('denominacion'))
            <span class="error-message">{{ $errors->first('denominacion') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label for="user_id" class="form-label">@lang('Owner')</label>
            <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="user_id" {{$btndisabled}}>
                <option value="0">@lang('Propietario')</option>
                @forelse($propietarios as $propietario)
                @if ( old('user_id', $propiedad->user_id) == $propietario->id )
                <option value="{{ $propietario->id }}" selected > {{ $propietario->name }} </option>
                @else
                <option value="{{ $propietario->id }}"> {{ $propietario->name }} </option>
                @endif
                @empty
                <p>No hay propietarios</p>
                @endforelse
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="coeficiente"> @lang('Coeficiente') </label>
            <input type="number" name="coeficiente" class="form-control" min="1" max="100" placeholder="@lang('Coeficiente...')" value="{{ old('coeficiente', $propiedad->coeficiente) }}" {{$btndisabled}} required>
            @if ($errors->has('coeficiente'))
            <span class="error-message">{{ $errors->first('coeficiente') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="parte"> @lang('Parte') </label>
            <input type="number" name="parte" class="form-control" placeholder="@lang('Parte...')" value="{{ old('parte', $propiedad->parte) }}" {{$btndisabled}} required>
            @if ($errors->has('parte'))
            <span class="error-message">{{ $errors->first('parte') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="tipo" class="form-label">@lang('Property Type')</label>
            <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="tipo" {{$btndisabled}}>
                <option value="0">@lang('Property Type')</option>
                @forelse($tipos as $tipo)
                @if ( old('tipo', $propiedad->tipo) == $tipo->codigo )
                <option value="{{ $tipo->codigo }}" selected > {{ $tipo->descripcion }} </option>
                @else
                <option value="{{ $tipo->codigo }}"> {{ $tipo->descripcion }} </option>
                @endif
                @empty
                <p>No hay tipo de propiedades</p>
                @endforelse
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <!-- textarea -->
        <div class="form-group">
            <label>@lang('Observaciones')</label>
            <textarea class="form-control" name="observaciones" rows="5" placeholder="Observaciones ..." value="{{old('observaciones', $propiedad->observaciones)}}" {{$btndisabled}}>{{old('observaciones', $propiedad->observaciones)}}</textarea>
        </div>
    </div>
</div>
<input type="integer" id="cmd_seleccionada" name="comunidad_id" value="{{Session()->get('cmd_seleccionada')->id}}" readonly hidden />