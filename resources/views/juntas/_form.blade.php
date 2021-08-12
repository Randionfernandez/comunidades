@csrf

@if($btndisabled != 'disabled')
@include('partials.btneditback', ['ruta' => 'juntas.index'])
@else
@include('partials.btneditdeleteback', ['route1' => 'juntas.edit', 'variable' => $junta, 'route2' => 'juntas.index', 'route3' => 'juntas.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row">
    <div class="col-sm-9">
        <!-- text input -->
        <div class="form-group">
            <label for="denominacion"> @lang('Denomination') </label>
            <input type="text" name="denominacion" class="form-control" placeholder="@lang('Denomination...')" value="{{ old('denominacion', $junta->denominacion) }}" {{$btndisabled}} required>
            @if ($errors->has('denominacion'))
            <span class="error-message">{{ $errors->first('denominacion') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <label for="tipo"> @lang('Tipo de Convocatoria') </label>
        <div class="form-group">
            @forelse($tipos as $tipo)
            @php $checked = '' @endphp
            <div class="form-check">
                @if ( old('tipo', $junta->tipo) == $tipo )
                    @php $checked = 'checked' @endphp
                @endif
                <input class="form-check-input" type="radio" name="tipo" value="{{$tipo}}" {{$checked}} {{$btndisabled}}>
                <label class="form-check-label" for="tipo">{{$tipo}}</label>
            </div>
            @empty
                <p>@lang('Empty')</p>
            @endforelse
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="fechaprimera"> @lang('Fecha Primera') </label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="fechaprimera" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('fechaprimera', $junta->fechaprimera) }}" {{$btndisabled}} required/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            @if ($errors->has('fechaprimera'))
            <span class="error-message">{{ $errors->first('fechaprimera') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label for="horaprimera">@lang('Hora primera')</label>
                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" name="horaprimera" value="{{ old('horaprimera', $junta->horaprimera) }}" {{$btndisabled}} required/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="fechasegunda"> @lang('Fecha Segunda') </label>
            <div class="input-group date" id="reservationdate2" data-target-input="nearest">
                <input type="text" name="fechasegunda" class="form-control datetimepicker-input" data-target="#reservationdate2" value="{{ old('fechasegunda', $junta->fechasegunda) }}" {{$btndisabled}} required/>
                <div class="input-group-append" data-target="#reservationdate2" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            @if ($errors->has('fechasegunda'))
            <span class="error-message">{{ $errors->first('fechasegunda') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <div class="bootstrap-timepicker">
                <div class="form-group">
                    <label for="horasegunda">@lang('Hora segunda')</label>
                    <div class="input-group date" id="timepicker2" data-target-input="nearest">
                        <input type="text" name="horasegunda" class="form-control datetimepicker-input" data-target="#timepicker2" value="{{ old('horasegunda', $junta->horasegunda) }}" {{$btndisabled}} required/>
                        <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <!-- textarea -->
        <div class="form-group">
            <label for="ordendia">@lang('Orden del dia')</label>
            <textarea class="form-control" name="ordendia" maxlength="35" rows="5" placeholder="Orden del dia..." value="{{old('ordendia', $junta->ordendia)}}" {{$btndisabled}}>{{old('ordendia', $junta->ordendia)}}</textarea>
            @if ($errors->has('ordendia'))
            <span class="error-message">{{ $errors->first('ordendia') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="form-group">
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="user_id" value="{{ old('user_id', auth()->user()->id) }}" hidden>
</div>
<div class="form-group">
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="comunidad_id" value="{{ old('comunidad_id', session()->get('cmd_seleccionada')->id) }}" hidden>
</div>