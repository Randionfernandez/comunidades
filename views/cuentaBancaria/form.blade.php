<button class="btn btn-primary col-md-1 mx-4 mb-3">{{$btn}}</button>
<a class="btn btn-primary col-md-1 mx-4 mb-3"  href="{{route('cuentasBancarias.index')}}">Volver</a>

   <div class="row mx-3">
        <div class="col-md-4 mb-4">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre',$cuentasBancarias->nombre)}}" placeholder="Cuenta comunitaria" >
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
            <input type="text" class="form-control" name="pais" value="{{old('pais',$cuentasBancarias->pais)}}" placeholder="ES">
            <label for="letras" class="form-label">2 letras</label>
            
            @error('pais')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

        </div>
        
        <div class="col-md-3">
            <label for="dc" class="form-label">DC</label>
            <input type="text" class="form-control" name="dc" value="{{old('dc',$cuentasBancarias->dc)}}" placeholder="34">
            <label for="digitos" class="form-label">2 digitos</label>
            @error('dc')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror

        </div>
        
        <div class="col-md-3">
            <label for="cuenta" class="form-label">Cuenta</label>
            <input type="text" class="form-control" name="cuenta" placeholder="ES7640044901230456660863	" value="{{old('cuenta',$cuentasBancarias->cuenta)}}">
            <label for="cuentaDigitos" class="form-label">24 digitos para cuentas ES</label>
            @error('cuenta')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

        <div class="col-md-3">
            <label for="bic" class="form-label">Bic</label>
            <input type="text" class="form-control" name="bic" value="{{old('bic',$cuentasBancarias->bic)}}" placeholder="BSCHESMMXXX">
            <label for="ej" class="form-label">Ej. BSCHESMMXXX</label>
            @error('bic')
                <br>
                <small>*{{$message}}</small>
                <br>
            @enderror
        </div>

    </div>
    </div>