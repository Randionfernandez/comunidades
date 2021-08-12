@csrf

@if($btndisabled != 'disabled')
    @include('partials.btneditback', ['ruta' => 'cuentas.index'])
@else
@include('partials.btneditdeleteback', ['route1' => 'cuentas.edit', 'variable' => $cuenta, 'route2' => 'cuentas.index', 'route3' => 'cuentas.destroy'])
@endif

<div class="row">
    <div class="col-sm-9">
        <!-- text input -->
        <div class="form-group">
            <label for="denominacion"> @lang('Denomination') </label>
            <input type="text" name="denominacion" maxlength="35" class="form-control" placeholder="@lang('Denomination cuenta comunitaria...')" value="{{ old('denominacion', $cuenta->denominacion) }}" oninput="this.value = this.value.toUpperCase()" {{$btndisabled}}>
            @if ($errors->has('denominacion'))
            <span class="error-message">{{ $errors->first('denominacion') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-3">
        <!-- text input -->
        <div class="form-group">
            <label for="siglas"> @lang('Siglas') </label>
            <input type="text" name="siglas" size="4" maxlength="4" class="form-control" placeholder="@lang('Siglas...')" value="{{ old('siglas', $cuenta->siglas) }}" oninput="this.value = this.value.toUpperCase()" {{$btndisabled}}>
            @if ($errors->has('siglas'))
            <span class="error-message">{{ $errors->first('siglas') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="iban"> @lang('Iban') </label>
            <input type="text" name="iban" size="24" maxlength="24" class="form-control" placeholder="@lang('Iban...')" value="{{ old('iban', $cuenta->iban) }}" {{$btndisabled}} required>
            <label for="iban" class="form-label">24 digitos para cuentas ES7640044901230456660863</label>
            @if ($errors->has('iban'))
            <span class="error-message">{{ $errors->first('iban') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="bic"> @lang('BIC') </label>
            <input type="text" name="bic" class="form-control" placeholder="@lang('BIC...')" value="{{ old('bic', $cuenta->bic) }}" oninput="this.value = this.value.toUpperCase()" {{$btndisabled}}>
            <label for="bic" class="form-label">Ej. BSCHESMMXXX</label>
            @if ($errors->has('bic'))
            <span class="error-message">{{ $errors->first('bic') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="fecha_apertura"> @lang('Fecha de apertura') </label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="fecha_apertura" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('fecha_apertura', $cuenta->fecha_apertura) }}" {{$btndisabled}} required/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            @if ($errors->has('fecha_apertura'))
            <span class="error-message">{{ $errors->first('fecha_apertura') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="saldo"> @lang('Saldo') </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">.00</span>
                </div>
                <input type="number" class="form-control" name="saldo" step="0.01" min="0" value="{{old('saldo', $cuenta->saldo)}}" placeholder="10.01 €" {{ $btndisabled }}>
                <div class="input-group-append">
                    <span class="input-group-text">€</span>
                </div>
            </div>
            @if ($errors->has('saldo'))
            <span class="error-message">{{ $errors->first('saldo') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="divisa" class="form-label">@lang('Divisa')</label>
            <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="divisa" {{$btndisabled}}>
                <option value="0">@lang('Propietario')</option>
                @forelse($divisas as $divisa)
                @if ( old('divisa', $cuenta->divisa) == $divisa->codigo )
                <option value="{{ $divisa->codigo }}" selected > {{ $divisa->nombre }} </option>
                @else
                <option value="{{ $divisa->codigo }}"> {{ $divisa->nombre }} </option>
                @endif
                @empty
                <p>@lang('No hay divisas disponibles')</p>
                @endforelse
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <!-- textarea -->
        <div class="form-group">
            <label for="comentarios">@lang('Comentario')</label>
            <textarea class="form-control" name="comentarios" rows="5" placeholder="Comentarios ..." value="{{old('comentarios', $cuenta->comentarios)}}" {{$btndisabled}}>{{old('comentarios', $cuenta->comentarios)}}</textarea>
        </div>
    </div>
</div>

<input value="{{session()->get('cmd_seleccionada')->id}}" name="comunidad_id" type="number" hidden/>