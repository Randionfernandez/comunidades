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
    
    <div class="col-md-4">
        <label for="fechaValor" class="form-label">@lang('Fecha valor')</label>
        <input type="date" class="form-control"  name="fechaValor" value="{{old('fechaValor',$movimiento->fechaValor)}}" {{$btndisabled}} required>
    </div>
    @if($cuentas->count())
    <div class="col-md-4 mb-2" >
        <label for="cuenta" class="form-label">@lang('Cuenta')</label>
        <select class="form-select" aria-label="Default select example" name="cuenta" {{$btndisabled}} required>
            <option value="">@lang('Cuenta')</option>
            @forelse($cuentas as $cuenta)
            @if ( old('cuenta', $movimiento->cuenta) == $cuenta->id)
            <option value="{{ $cuenta->id }}" selected> {{ $cuenta->denominacion}} </option>
            @else
            <option value="{{ $cuenta->id }}"> {{ $cuenta->denominacion}} </option>
            @endif
            @empty
            <p>No hay cuentas</p>
            @endforelse
        </select>
    </div>
    @endif

    <div class="col-md-4">
        <label for="concepto" class="form-label">@lang('Concepto')</label>
        <input type="text" class="form-control"  name="concepto" value="{{old('concepto',$cuenta->concepto)}}" {{$btndisabled}} required>
    </div>
    
    <div id="divgrupopropiedad" class="col-md-4 mb-2" >
        <label id="grupo_label" for="grupo" class="form-label">@lang('Group')</label>
        <select id="grupo" class="form-select" aria-label="Default select example" name="grupo" {{$btndisabled}}>
            <option value="">@lang('Group')</option>
            @forelse($grupos as $grupo)
            @if ( old('grupo', $grupo->name) == $movimiento->grupo)
            <option value="{{ $grupo->name }}" selected > {{ $grupo->name}} </option>
            @else
            <option value="{{ $grupo->name }}"> {{ $grupo->name}} </option>
            @endif
            @empty
            <p>vacio</p>
            @endforelse
        </select>
        <label id="propiedad_label" for="propiedad" class="form-label">Propiedad</label>
        <select id="propiedad" name="propiedad" class="form-select" {{$btndisabled}}>
            @if ($propiedades->count())
            <option value="">Propiedades</option>
            @foreach ($propiedades as $propiedad)
            <option value="{{$propiedad->id}}" {{(old('propiedad') == $propiedad->id ? 'selected' : '')}} name="{{$propiedad->denominacion}}" > {{ $propiedad->denominacion}}</option>
            @endforeach
            @else
            <option value="">No hay propiedades</option>
            @endif
        </select>
    </div>

    @if($cuentas->count())
    <div class="col">
        <label for="importe" class="form-label">Cantidad</label>
        <input type="number" min="0.0" step="any" name="importe" class="form-control" value="{{old('importe' ,$movimiento->importe)}}" placeholder="0.00 €" {{$btndisabled}} required>
    </div>

    <div class="col-md-12 mb-3">
        <label for="obsevaciones" class="form-label">Obsevaciones</label>
        <textarea class="form-control" name="observaciones" rows="2" {{$btndisabled}}>{{old('observaciones',$movimiento->observaciones)}}</textarea>
    </div>
    @else
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not accounts created yet'])
    @endif
</div>