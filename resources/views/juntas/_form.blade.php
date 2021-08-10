@csrf

@if($btndisabled != 'disabled')
    @include('partials.btneditback', ['ruta' => 'juntas.index'])
@else
    @include('partials.btneditdeleteback', ['route1' => 'juntas.edit', 'variable' => $junta, 'route2' => 'juntas.index', 'route3' => 'juntas.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="form-group">
    <label for="denominacion">@lang('denominacion')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="denominacion" placeholder=@lang('denominacion') value="{{ old('denominacion', $junta->denominacion) }}" {{$btndisabled}} required>
    @if ($errors->has('denominacion'))
    <span class="error-message">{{ $errors->first('denominacion') }}</span>
    @endif
</div>
<div class="row form-group">
    <div class="col-6">
        <div class="form-group">
            <label for="fechaprimera">@lang('Fecha Primera')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechaprimera" placeholder=@lang('fechaprimera') value="{{ old('fechaprimera', $junta->fechaprimera) }}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="horaprimera">@lang('Hora primera')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="time" name="horaprimera" placeholder=@lang('horaprimera') value="{{ old('horaprimera', $junta->horaprimera) }}" {{$btndisabled}} required>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col-6">
        <div class="form-group">
            <label for="fechasegunda">@lang('Fecha Segunda')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechasegunda" placeholder=@lang('fechasegunda') value="{{ old('fechasegunda', $junta->fechasegunda) }}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="horaprimera">@lang('Hora Segunda')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="time" name="horasegunda" placeholder=@lang('horasegunda') value="{{ old('horasegunda', $junta->horasegunda) }}" {{$btndisabled}} required>
        </div>
    </div>
</div>


<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Day Order')</b>
        <hr>
    </div>
    <div class="panel-body">
        <select class="form-select col-4" aria-label="Default select example" name="tipo" {{$btndisabled}}>
            <option value="0">@lang('Tipos')</option>
            @forelse($tipos as $tipo)
            @if ( old('tipo', $junta->tipo) == $tipo )
            <option value="{{ $tipo }}" selected > {{ $tipo }} </option>
            @else
            <option value="{{ $tipo }}"> {{ $tipo }} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
        <div class="form-group">
            <label for="ordendia">@lang('ordendia')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="ordendia" placeholder=@lang('ordendia') value="{{ old('ordendia', $junta->ordendia) }}" {{$btndisabled}} required>
            @if ($errors->has('ordendia'))
            <span class="error-message">{{ $errors->first('ordendia') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="user_id" value="{{ old('user_id', auth()->user()->id) }}" hidden>
        </div>
        <div class="form-group">
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="comunidad_id" value="{{ old('comunidad_id', session()->get('cmd_seleccionada')->id) }}" hidden>
        </div>
    </div>
</div>
</div>