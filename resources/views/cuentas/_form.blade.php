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
            <label for="denominacion" class="form-label">@lang('Banca')</label>
            <input type="text" class="form-control" name="denominacion" value="{{old('denominacion',$cuenta->denominacion)}}" placeholder="Cuenta comunitaria" {{ $btndisabled }}>
            @error('denominacion')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>
       
       <div class="col-md-4 mb-2" >
                <label for="pais" class="form-label">@lang('Country')</label>
                <select class="form-select" aria-label="Default select example" name="pais" {{$btndisabled}}>
                    <option value="0">@lang('Country')</option>
                    @forelse($paises as $pais)
                    @if ( old('pais', $cuenta->pais) == $pais->id )
                    <option value="{{ $pais->codigoISO }}" selected > {{ $pais->codigoISO }} </option>
                    @else
                    <option value="{{ $pais->codigoISO }}"> {{ $pais->codigoISO }} </option>
                    @endif
                    @empty
                    <p>No hay paises</p>
                    @endforelse
                </select>
            </div>

    </div> 

    <div class="row mx-3">
        
        <div class="col-md-3">
            <label for="dc" class="form-label">DC</label>
            <input type="text" class="form-control" name="dc" value="{{old('dc',$cuenta->dc)}}" placeholder="34" {{ $btndisabled }}>
            <label for="digitos" class="form-label">2 digitos</label>
            @error('dc')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

        </div>
        
        <div class="col-md-5">
            <label for="cuenta" class="form-label">Cuenta</label>
            <input type="text" class="form-control" name="cuenta" placeholder="ES7640044901230456660863	" value="{{old('cuenta',$cuenta->cuenta)}}" {{ $btndisabled }}>
            <label for="cuentaDigitos" class="form-label">24 digitos para cuentas ES</label>
            @error('cuenta')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

        <div class="col-md-4">
            <label for="bic" class="form-label">Bic</label>
            <input type="text" class="form-control" name="bic" value="{{old('bic',$cuenta->bic)}}" placeholder="BSCHESMMXXX" {{ $btndisabled }}>
            <label for="ej" class="form-label">Ej. BSCHESMMXXX</label>
            @error('bic')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

    </div>
    </div>