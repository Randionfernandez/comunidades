@csrf

@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('cuentasBancarias.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
    @include('partials.btneditdeleteback', ['route1' => 'cuentasBancarias.edit', 'variable' => $cuentasBancarias, 'route2' => 'cuentasBancarias.index', 'route3' => 'cuentasBancarias.destroy'])
@endif

   <div class="row mx-3">
        <div class="col-md-4 mb-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre',$cuentasBancarias->nombre)}}" placeholder="Cuenta comunitaria" {{ $btndisabled }}>
            @error('nombre')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

    </div> 

    <div class="row mx-3">
        <div class="col-md-2">
            <label for="pais" class="form-label">Pais</label>
            <input type="text" class="form-control" name="pais" value="{{old('pais',$cuentasBancarias->pais)}}" placeholder="ESP" {{ $btndisabled }}>
            <label for="letras" class="form-label">3 letras</label>
            
            @error('pais')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

        </div>
        
        <div class="col-md-3">
            <label for="dc" class="form-label">DC</label>
            <input type="text" class="form-control" name="dc" value="{{old('dc',$cuentasBancarias->dc)}}" placeholder="34" {{ $btndisabled }}>
            <label for="digitos" class="form-label">2 digitos</label>
            @error('dc')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

        </div>
        
        <div class="col-md-3">
            <label for="cuenta" class="form-label">Cuenta</label>
            <input type="text" class="form-control" name="cuenta" placeholder="ES7640044901230456660863	" value="{{old('cuenta',$cuentasBancarias->cuenta)}}" {{ $btndisabled }}>
            <label for="cuentaDigitos" class="form-label">24 digitos para cuentas ES</label>
            @error('cuenta')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="bic" class="form-label">Bic</label>
            <input type="text" class="form-control" name="bic" value="{{old('bic',$cuentasBancarias->bic)}}" placeholder="BSCHESMMXXX" {{ $btndisabled }}>
            <label for="ej" class="form-label">Ej. BSCHESMMXXX</label>
            @error('bic')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

    </div>
    </div>