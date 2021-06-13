
<button class="btn btn-primary col-md-1 mx-4 mb-3">Guardar</button>
<a href="{{route('movimientos.index')}}" class="btn btn-primary col-md-1 mx-4 mb-3">Volver</a>


<div class="row mx-4">

<div class="col-md-4 mb-2" >
    <label for="fechaAlta" class="form-label">Fecha Alta</label>
    <input type="text" class="form-control" value="{{ date('Y-m-d')}}"  name="fechaAlta">
    @error('fechaAlta')
        <br>
        {{$message}}
        <br>
    @enderror
</div>

<select class="form-select col-4" aria-label="Default select example" name="cuenta">
    <option>@lang('cuenta')</option>
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



<!--
<div class="col-md-4">
    <label for="cuenta" class="form-label">Cuenta</label>
    <select class="form-select" name="cuenta">
        @if($movimientos->count())
            
            @foreach($movimientos as $movimiento)
                <option value="{{ $movimiento->cuenta }}" {{(old('cuenta') == $movimiento->cuenta) ? 'selected' : '' }} name="{{ $movimiento->cuenta }}">{{ $movimiento->cuenta }}</option>
            @endforeach
         @else
         <option value="" name="">No hay cuentas</option>
        @endif
    </select>
</div>
-->

<!--Grupos 
<div class="col-md-4">
    <label for="grupo" class="form-label">Grupos</label>
    <select class="form-select" name="grupo">
        @if($grupos->count())
       
            <option value="">Grupos</option>
            @foreach($grupos as $grupo)
               
                <option value="{{$grupo->nombre }}" {{(old('grupo',$movimiento->grupo) == $grupo->nombre)  ? 'selected': '' }} name="{{ $grupo->nombre }}">{{ $grupo->nombre }}</option>
            @endforeach
         @else
         <option value="" name="">No hay grupos de distribucion</option>
        @endif
    </select>
</div>
-->
<!--
<select class="form-select col-4" aria-label="Default select example" name="grupo">
    <option>@lang('grupo')</option>
    @forelse($grupos as $grupo)
    @if ( old('grupo', $grupo->nombre) == $movimiento->grupo)
    <option value="{{ $grupo->nombre }}" selected > {{ $grupo->nombre}} </option>
    @else
    <option value="{{ $grupo->nombre }}"> {{ $grupo->nombre}} </option>
    @endif
    @empty
    <p>vacio</p>
    @endforelse
</select>
-->


<select class="form-select col-4" aria-label="Default select example" name="grupo">
    <option>@lang('grupo')</option>
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



<!--
<div class="col-md-4">
    <label for="distribucion" class="form-label">Distribucion</label>
    <select class="form-select" name="distribucion">
        <option value=""></option>
        <option value="coeficiente" {{(old('distribucion') == 'coeficiente')  ? 'selected': '' }} name="coeficiente">Coeficiente</option>
        <option value="unidadRegistral" name="unidadRegistral" {{(old('distribucion') == 'unidadRegistral') ? 'selected': ''}}>UnidadRegistral</option>          
    </select>
</div>
-->

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
    <select name="propiedad" class="form-select">Propiedad
    @if ($propiedades->count())
        <option value=""></option>
        @foreach ($propiedades as $propiedad)
            <option value="{{old('$propiedad->propiedad',$movimiento->propiedad)}}" {{(old('propiedad') == $propiedad->propiedad ? 'selected' : '')}} name="{{$propiedad->propiedad}}">{{$propiedad->propiedad}}</option>
        @endforeach
        @else
            <option value="">No hay propiedades</option>
    @endif

    @error('propiedad')
        <br>
        {{$message}}
        <br>
    @enderror
</div>

<div class="col-md-4">
    @if($movimientos->count())
    <label for="cantidad" class="form-label">Cantidad</label>
    <input type="text" name="cantidad" class="form-control" value="{{old('cantidad' ,$fran->cantidad)}}" placeholder="0.00">
    @error('cantidad')
        <br>
        {{$message}}
        <br>
        @else
        <option value="" name="">No hay cuentas</option>
        @endif
    @enderror
</div>


<div class="col-md-4 mb-3">
    @if($movimientos->count())
    <label for="obsevaciones" class="form-label">Obsevaciones</label>
    <textarea class="form-control" name="observaciones" rows="2">  {{old('observaciones',$fran->observaciones)}}</textarea>
    @error('observaciones')
        <br>
        {{$message}}
        <br>
         @else
        <option value="" name="">No hay cuentas</option>
        @endif
    @enderror
</div>
</div>