
<button class="btn btn-primary col-md-1 mx-4 mb-3">Guardar</button>
<a href="{{route('movimientos.index')}}" class="btn btn-danger col-md-1 mx-4 mb-3">Volver</a>


<div class="row mx-4">

    <div class="col-md-4 mb-2" >
        <label for="fechaAlta" class="form-label">Fecha Alta</label>
        <input type="text" class="form-control" value="{{ date('Y-m-d')}}"  name="fechaAlta" readonly>
        @error('fechaAlta')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>

    <div class="col-md-4 mb-2" >
        <label for="cuenta" class="form-label">@lang('Cuenta')</label>
        <select class="form-select" aria-label="Default select example" name="cuenta">
            <option>@lang('Cuenta')</option>
            @forelse($movimientos as $movimiento1)
            @if ( old('cuenta', $movimiento1->cuenta) == $fran->cuenta )
            <option value="{{ $movimiento1->cuenta }}" selected > {{ $movimiento1->cuenta}} </option>
            @else
            <option value="{{ $movimiento1->cuenta }}"> {{ $movimiento1->cuenta}} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
    </div>

    <div class="col-md-4 mb-2" >
        <label for="grupo" class="form-label">@lang('Group')</label>
        <select class="form-select" aria-label="Default select example" name="grupo">
            <option>@lang('Group')</option>
            @forelse($grupos as $grupo)
            @if ( old('grupo', $grupo->nombre) == $fran->grupo)
            <option value="{{ $grupo->nombre }}" selected > {{ $grupo->nombre}} </option>
            @else
            <option value="{{ $grupo->nombre }}"> {{ $grupo->nombre}} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
    </div>

    <div class="col-md-4">
        <label for="fechaValor" class="form-label">Fecha valor</label>
        <input type="date" class="form-control"  name="fechaValor" value="{{old('fechaValor',$fran->fechaValor)}}">
        @error('fechaValor')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>

    <div class="col-md-4">
        <label for="concepto" class="form-label">Concepto</label>
        <select class="form-select" name="concepto" >
            <option value=""></option>
            <option value="agua"  @if ($fran->concepto == 'agua')  selected  @endif name="agua" >Agua</option>
            <option value="Alcantarillado"  @if ($fran->concepto == 'Alcantarillado')  selected  @endif name="Alcantarillado">Alcantarillado</option>
            <option value="Ascensor" @if ($fran->concepto == 'Ascensor')  selected  @endif name="Ascensor" >Ascensor</option>
            <option value="Basuras" @if ($fran->concepto == 'Basuras')  selected  @endif name="Basuras" >Basuras</option>
            <option value="Electricidad" @if ($fran->concepto == 'Electricidad')  selected  @endif name="Electricidad" >Electricidad</option>
            <option value="Gas" @if ($fran->concepto == 'Gas')  selected  @endif name="Gas" >Gas</option>
            <option value="limpiezaEscalera" @if ($fran->concepto == 'limpiezaEscalera')  selected  @endif name="limpiezaEscalera" >Limpieza escalera</option>
            <option value="limpiezaGarage" @if ($fran->concepto == 'limpiezaGarage')  selected  @endif name="limpiezaGarage" >Limpieza Garage</option>
            <option value="limpiezaJardin" @if ($fran->concepto == 'limpiezaJardin')  selected  @endif name="limpiezaJardin" >Limpieza Jardin</option>
            <option value="piscina"  @if ($fran->concepto == 'piscina')  selected  @endif name="piscina" >Piscina</option>
            <option value="porteria" @if ($fran->concepto == 'porteria')  selected  @endif name="porteria" >Porteria</option>
            <option value="ingreso" @if ($fran->concepto == 'ingreso')  selected  @endif name="ingreso" >Ingreso</option>

        </select>
    </div>


    <div class="col-md-4">
        <label for="propiedad" class="form-label">Propiedad</label>
        <select name="propiedad" class="form-select">
            @if ($propiedades->count())
            <option>Propiedades</option>
            @foreach ($propiedades as $propiedad)
            <option value="{{$propiedad->propiedad}}" {{(old('propiedad') == $propiedad->propiedad ? 'selected' : '')}} name="{{$propiedad->propiedad}}" > {{ $propiedad->propiedad}}</option>
            @endforeach
            @else
            <option value="">No hay propiedades</option>
            @endif


        </select>
        @error('propiedad')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>


    <div class="col-md-4">
        @if($movimientos->count())
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="text" name="cantidad" class="form-control" value="{{old('cantidad' ,$fran->cantidad)}}" placeholder="0.00 €">
        @else
        <option value="" name="">No hay cuentas</option>
        @endif
        @error('cantidad')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>


    <div class="col-md-4 mb-3">
        @if($movimientos->count())
        <label for="obsevaciones" class="form-label">Obsevaciones</label>
        <textarea class="form-control" name="observaciones" rows="2">  {{old('observaciones',$fran->observaciones)}}</textarea>
        @else
        <option value="" name="">No hay cuentas</option>
        @endif
        @error('observaciones')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>
</div>