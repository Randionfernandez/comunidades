@csrf

@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('cuentas.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
@include('partials.btneditdeleteback', ['route1' => 'cuentas.edit', 'variable' => $cuenta, 'route2' => 'cuentas.index', 'route3' => 'cuentas.destroy'])
@endif

<div class="row mx-3">

    <div class="col-md-8 mb-2">
        <label for="denominacion" class="form-label">@lang('Denominacion')</label>
        <input type="text" class="form-control" name="denominacion" maxlength="35" value="{{old('denominacion',$cuenta->denominacion)}}" placeholder="Cuenta comunitaria" {{ $btndisabled }}>
        @error('denominacion')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>
    
    <div class="col-md-4 mb-2">
        <label for="siglas" class="form-label">@lang('Siglas')</label>
        <input type="text" class="form-control" name="siglas" size="4" maxlength="4" value="{{old('siglas',$cuenta->siglas)}}" placeholder="Siglas" {{ $btndisabled }}>
        @error('siglas')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>
</div>

<div class="row mx-3">
    <div class="col-md-3">
        <label for="fecha_apertura" class="form-label">@lang('Fecha de Apertura')</label>
        <input type="date" class="form-control" name="fecha_apertura" value="{{old('fecha_apertura',$cuenta->fecha_apertura)}}" placeholder="34" {{ $btndisabled }}>
        @error('fecha_apertura')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>

    <div class="col-md-5">
        <label for="iban" class="form-label">@lang('Iban')</label>
        <input type="text" class="form-control" name="iban" size="25" maxlength="25" placeholder="ES76400449012304566608634" value="{{old('iban',$cuenta->iban)}}" {{ $btndisabled }}>
        <label for="iban" class="form-label">25 digitos para cuentas ES76400449012304566608634</label>
        @error('iban')
        <br>
        <small>{{$message}}</small>
        <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="bic" class="form-label">@lang('Bic')</label>
        <input type="text" class="form-control" name="bic" value="{{old('bic',$cuenta->bic)}}" placeholder="BSCHESMMXXX" {{ $btndisabled }}>
        <label for="bic" class="form-label">Ej. BSCHESMMXXX</label>
        @error('bic')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>
</div>

<div class="row mx-3">
    <div class="col-md-8">
        <label for="saldo" class="form-label">@lang('Saldo')</label>
        <input type="number" class="form-control" name="saldo" step="0.01" min="0" value="{{old('saldo', $cuenta->saldo)}}" placeholder="10.01 €" {{ $btndisabled }}>
        @error('saldo')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="divisa" class="form-label">@lang('Divisa')</label>
        <select class="form-select" aria-label="Default select example" name="divisa" {{$btndisabled}}>
            <option value="EUR">@lang('Divisa')</option>
            @forelse($divisas as $divisa)
            @if ( old('divisa', $cuenta->divisa) == $divisa)
            <option value="{{ $divisa }}" selected > {{ $divisa }} </option>
            @else
            <option value="{{ $divisa }}"> {{ $divisa }} </option>
            @endif
            @empty
            <p>No hay divisas disponibles</p>
            @endforelse
        </select>
        @error('divisa')
        <br>
        <small>*{{$message}}</small>
        <br>
        @enderror
    </div>
</div>

<div class="row mx-3">
    <label for="comentarios" class="form-label">@lang('Comentario')</label>
    <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="comentarios" rows="5" cols="10" " name="comentarios" placeholder=@lang('Comentario') value="{{old('comentarios', $cuenta->comentarios)}}" {{$btndisabled}}>{{old('comentarios', $cuenta->comentarios)}}</textarea>
</div>

<input value="{{session()->get('activeCommunity')->id}}" name="comunidad_id" type="number" hidden/>