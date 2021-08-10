@csrf

@if($btndisabled != 'disabled')
    @include('partials.btneditback', ['ruta' => 'distribuciones.index'])
@else
@include('partials.btneditdeleteback', ['route1' => 'propiedades.edit', 'variable' => $propiedades, 'route2' => 'propiedades.index', 'route3' => 'propiedades.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

@if ($propiedades->count())
<div class="row form-group">
    <div class="col-4">
        <label for="orden">@lang('Orden')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="number" name="orden" placeholder="1" value="{{ old('orden', $distribucion->orden) }}" {{$btndisabled}} required>
        <label class="form-label" for="orden">@lang('Numero ej. 1')</label>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="abreviatura">@lang('Abreviatura')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" name="abreviatura" placeholder=@lang('abreviatura') value="{{ old('abreviatura', $distribucion->abreviatura) }}" {{$btndisabled}} required>
            <label for="abreviatura">@lang('Letra Ej. ABC')</label>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="name">@lang('Name')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" name="name" placeholder=@lang('name') value="{{ old('name', $distribucion->name) }}" {{$btndisabled}} required >
            <label for="name">@lang('Letras y numeros. Ej. General')</label>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-hover dt-responsive nowrap" id="buscador">
            <thead>
                <tr class="text-white bg-dark">
                    <th></th>
                    <th></th>
                    <th>@lang('Propiedad')</th>
                    <th>@lang('Coeficiente')</th>
                </tr>
            </thead>

            <tbody>
                @if ($propiedades->count())
                @forelse ($propiedades as $propiedad)
                <tr>
                    <td><input type="hidden"  name="id[]" value="{{old('id[]', $propiedad->id)}}"></td>
                    <td><input class="form-check-input" type="checkbox" name='checkbox[]' value="{{old('checkbox[]', $propiedad->id)}}" id="checkbox"></td>
                    <td><input type="text" class="form-control" name="propiedad[]" value="{{ old('propiedad[]', $propiedad->id)}}" placeholder="{{$propiedad->id}}" hidden readonly> <a href="{{ route('propiedades.show', $propiedad) }}" style="text-decoration: none"><input type="text" class="form-control" placeholder="{{$propiedad->denominacion}}" readonly></a></td>
                    <td><input type="text" class="form-control" name="coeficiente[]" @if($coeficiente_if)  value="{{old('coeficiente[]',$propiedad->coeficiente)}}" @else value="" @endif placeholder="0"></td>
                </tr>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Propiedades created yet'])
                @endforelse
                @else
                <tr>
                    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Propiedades created yet'])
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@else
@include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Propiedades created yet'])
@endif