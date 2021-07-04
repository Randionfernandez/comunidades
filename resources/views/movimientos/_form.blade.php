@csrf
@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('movimientos.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
    @include('partials.btneditdeleteback', ['route1' => 'movimientos.edit', 'variable' => $movimiento, 'route2' => 'movimientos.index', 'route3' => 'movimientos.destroy'])
@endif

<div class="row mx-4">

    <div class="col-md-4 mb-2" >
        <label for="fechaAlta" class="form-label">Fecha Alta</label>
        <input type="text" class="form-control" value="{{date('Y-m-d')}}"  name="fechaAlta" readonly>
    </div>

    <div class="col-md-4 mb-2" >
        <label for="cuenta" class="form-label">@lang('Cuenta')</label>
        <select class="form-select" aria-label="Default select example" name="cuenta" {{$btndisabled}} required>
            <option value="">@lang('Cuenta')</option>
            @forelse($cuentas as $movimiento1)
            @if ( old('cuenta', $movimiento->cuenta) == $movimiento1->id)
            <option value="{{ $movimiento1->id }}" selected> {{ $movimiento1->cuenta}} </option>
            @else
            <option value="{{ $movimiento1->id }}"> {{ $movimiento1->cuenta}} </option>
            @endif
            @empty
            <p>No hay cuentas</p>
            @endforelse
        </select>
    </div>

    <div class="col-md-4 mb-2" >
        <label for="grupo" class="form-label">@lang('Group')</label>
        <select class="form-select" aria-label="Default select example" name="grupo" {{$btndisabled}}>
            <option value="">@lang('Group')</option>
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
    </div>

    <div class="col-md-4">
        <label for="fechaValor" class="form-label">@lang('Fecha valor')</label>
        <input type="date" class="form-control"  name="fechaValor" value="{{old('fechaValor',$movimiento->fechaValor)}}" {{$btndisabled}} required>
    </div>

    <div class="col-md-4">
        <label for="concepto" class="form-label">@lang('Concepto')</label>
        <select class="form-select" aria-label="Default select example" name="concepto" {{$btndisabled}} required>
            <option value="">@lang('Concepto')</option>
            @forelse($tiposGastos as $tipoGasto)
            @if ( old('concepto', $movimiento->concepto) == $tipoGasto->id )
            <option value="{{ $tipoGasto->id }}" selected > {{ $tipoGasto->nombreTipoGasto}} </option>
            @else
            <option value="{{ $tipoGasto->id }}"> {{ $tipoGasto->nombreTipoGasto }} </option>
            @endif
            @empty
            <p>No hay Tipos de Gastos</p>
            @endforelse
        </select>
    </div>


    <div class="col-md-4">
        <label for="propiedad" class="form-label">Propiedad</label>
        <select name="propiedad" class="form-select" {{$btndisabled}}>
            @if ($propiedades->count())
            <option value="">Propiedades</option>
            @foreach ($propiedades as $propiedad)
            <option value="{{$propiedad->id}}" {{(old('propiedad') == $propiedad->id ? 'selected' : '')}} name="{{$propiedad->name}}" > {{ $propiedad->name}}</option>
            @endforeach
            @else
            <option value="">No hay propiedades</option>
            @endif
        </select>
    </div>


    <div class="col-md-4">
        @if($cuentas->count())
        <label for="cantidad" class="form-label">Cantidad</label>
        <input type="number" min="0.0" step="any" name="cantidad" class="form-control" value="{{old('cantidad' ,$movimiento->cantidad)}}" placeholder="0.00 €" {{$btndisabled}} required>
        @else
        <option value="" name="">No hay cuentas</option>
        @endif
    </div>


    <div class="col-md-4 mb-3">
        @if($cuentas->count())
        <label for="obsevaciones" class="form-label">Obsevaciones</label>
        <textarea class="form-control" name="observaciones" rows="2" {{$btndisabled}}>  {{old('observaciones',$movimiento->observaciones)}}</textarea>
        @else
        <option value="" name="">No hay cuentas</option>
        @endif
    </div>
</div>