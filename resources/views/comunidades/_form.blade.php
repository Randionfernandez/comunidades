@csrf

@if($btndisabled != 'disabled')
<div class="inline-flex">
    <x-jet-button class="mx-2">{{ __($btnText1) }}</x-jet-button>
    <x-jet-danger-button onclick="location.href ='{{ route('comunidades.index') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
</div>
@else
    @include('partials.btneditdeleteback', ['route1' => 'comunidades.edit', 'comunidad' => $comunidad, 'route2' => 'comunidades.index', 'route3' => 'comunidades.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="form-group">
    <label for="denom">@lang('denom')</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="denom" placeholder=@lang('denom') value="{{ old('denom', $comunidad->denom) }}" {{$btndisabled}} required>
    @if ($errors->has('denom'))
    <span class="error-message">{{ $errors->first('denom') }}</span>
    @endif
</div>
<div class="row form-group">
    <div class="col-4">
        <label for="cif">@lang('cif')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="9" name="cif" placeholder=@lang('cif') value="{{ old('cif', $comunidad->cif) }}" {{$btndisabled}} required>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="fechalta">@lang('Create Date')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechalta" placeholder=@lang('fechalta') value="{{ old('fechalta', $comunidad->fechalta) }}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="partes">@lang('partes')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="number" name="partes" min="1" placeholder=@lang('partes') value="{{ old('partes', $comunidad->partes) }}" {{$btndisabled}} >
        </div>
    </div>
</div>


<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications direction')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="direccion">@lang('direction')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="direccion" placeholder=@lang('direction') value="{{ old('direccion', $comunidad->direccion) }}" {{$btndisabled}} required>
                </div>
            </div>

        </div>

        <div class="row form-group">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="5" name="cp" placeholder=@lang('cp') value="{{ old('cp', $comunidad->cp) }}" {{$btndisabled}} required>
                </div>
            </div>

            <div class="col-md-3 mb-2" >
                <label for="cuenta" class="form-label">@lang('Cuenta')</label>
                <select class="form-select" aria-label="Default select example" name="pais" {{$btndisabled}}>
                    <option value="0">@lang('Country')</option>
                    @forelse($paises as $pais)
                    @if ( old('pais', $comunidad->pais) == $pais->id )
                    <option value="{{ $pais->id }}" selected > {{ $pais->nombrePais }} </option>
                    @else
                    <option value="{{ $pais->id }}"> {{ $pais->nombrePais }} </option>
                    @endif
                    @empty
                    <p>vacio</p>
                    @endforelse
                </select>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label for="provincia">@lang('province')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="provincia" placeholder=@lang('province') value="{{ old('provincia', $comunidad->provincia) }}" {{$btndisabled}}>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="localidad">@lang('locality')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="localidad" placeholder=@lang('locality') value="{{ old('localidad', $comunidad->localidad) }}" {{$btndisabled}}>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="logo">@lang('logo')</label>
                    <input type="file" id="avatar" class="form-control border-0 bg-light shadow-sm" name="logo" {{$btndisabled}}>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="observaciones">@lang('observaciones')</label>
                    <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="name" rows="5" cols="10" " name="observaciones" placeholder=@lang('observaciones') value="{{ old('observaciones', $comunidad->observaciones) }}" {{$btndisabled}}> </textarea>
                </div>
            </div>
        </div>
    </div>
</div>