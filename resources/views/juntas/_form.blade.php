@csrf

<div class="inline-flex">
    <x-jet-button class="mx-2 {{$btndisabled}}">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button class="{{$btndisabled}}"  onclick="location.href ='{{ route('juntas.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>

<x-jet-validation-errors></x-jet-validation-errors>

<div class="form-group">
    <label for="denom_convocatoria">@lang('denom_convocatoria')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="denom_convocatoria" placeholder=@lang('denom_convocatoria') value="{{ old('denom_convocatoria', $junta->denom_convocatoria) }}" {{$btndisabled}} required>
    @if ($errors->has('denom_convocatoria'))
    <span class="error-message">{{ $errors->first('denom_convocatoria') }}</span>
    @endif
</div>
<div class="row form-group">
    <div class="col-6">
        <div class="form-group">
            <label for="fecha_primera">@lang('Fecha Primera')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fecha_primera" placeholder=@lang('fecha_primera') value="{{ old('fecha_primera', $junta->fecha_primera) }}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="hora_primera">@lang('Hora primera')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="time" name="hora_primera" placeholder=@lang('hora_primera') value="{{ old('hora_primera', $junta->hora_primera) }}" {{$btndisabled}} required>
        </div>
    </div>
</div>
<div class="row form-group">
    <div class="col-6">
        <div class="form-group">
            <label for="fecha_segunda">@lang('Fecha Segunda')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fecha_segunda" placeholder=@lang('fecha_segunda') value="{{ old('fecha_segunda', $junta->fecha_segunda) }}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="hora_primera">@lang('Hora Segunda')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="time" name="hora_segunda" placeholder=@lang('hora_segunda') value="{{ old('hora_segunda', $junta->hora_segunda) }}" {{$btndisabled}} required>
        </div>
    </div>
</div>


<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Day Order')</b>
        <hr>
    </div>
    <div class="panel-body">
        <select class="form-select col-4" aria-label="Default select example" name="tipo">
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
        <div class="row form-group">
            <!--<div class="col-md-12">
                 <div class="form-group">
                    <label for="logo">@lang('Orden del Dia')</label>
                    <input type="file" id="avatar" class="form-control border-0 bg-light shadow-sm" name="orden_dia" {{$btndisabled}}>
                </div>-->
        </div>
        <!--<div class="col-md-12">
            <div class="form-group">
                <label for="orden_dia">@lang('Orden del dia')</label>
                <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="name" rows="5" cols="10" " name="orden_dia" placeholder=@lang('Orden_del_Dia') value="{{ old('orden_dia', $junta->orden_dia) }}" {{$btndisabled}}> </textarea>
            </div>
        </div>-->
        <div class="form-group">
            <label for="orden_dia">@lang('orden_dia')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="orden_dia" placeholder=@lang('orden_dia') value="{{ old('orden_dia', $junta->orden_dia) }}" {{$btndisabled}} required>
            @if ($errors->has('orden_dia'))
            <span class="error-message">{{ $errors->first('orden_dia') }}</span>
            @endif
        </div>
        <div class="form-group">
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="user_id" value="{{ old('user_id', auth()->user()->id) }}" hidden>
        </div>
        <div class="form-group">
            <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="comunidad_id" value="{{ old('comunidad_id', session()->get('activeCommunity')->id) }}" hidden>
        </div>
    </div>
</div>
</div>