@csrf

@if($btndisabled != 'disabled')
@include('partials.btneditback', ['ruta' => 'comunidades.index'])
@else
@include('partials.btneditdeleteback', ['route1' => 'comunidades.edit', 'variable' => $comunidad, 'route2' => 'comunidades.index', 'route3' => 'comunidades.destroy'])
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="denom"> @lang('Denomination') </label>
            <input type="text" name="denom" maxlength="35" class="form-control" placeholder="@lang('Denom...')" value="{{ old('denom', $comunidad->denom) }}" {{$btndisabled}} required>
            @if ($errors->has('denom'))
            <span class="error-message">{{ $errors->first('denom') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="cif"> @lang('DOI') </label>
            <input type="text" name="cif" maxlength="9" class="form-control" placeholder="@lang('DOI')" value="{{ old('cif', $comunidad->cif) }}" {{$btndisabled}} required>
            @if ($errors->has('cif'))
            <span class="error-message">{{ $errors->first('cif') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="fechalta"> @lang('Fecha de alta') </label>
            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="fechalta" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{old('fechalta', $comunidad->fechalta)}}" {{$btndisabled}} required/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
            @if ($errors->has('fechalta'))
            <span class="error-message">{{ $errors->first('fechalta') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="partes"> @lang('Partes') </label>
            <input type="number" name="partes" min="1" class="form-control" placeholder="@lang('Partes')" value="{{ old('partes', $comunidad->partes) }}" {{$btndisabled}} >
            @if ($errors->has('partes'))
            <span class="error-message">{{ $errors->first('partes') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications direction')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-12">
                <!-- text input -->
                <div class="form-group">
                    <label for="direccion"> @lang('Direction') </label>
                    <input type="text" name="direccion" maxlength="40" class="form-control" placeholder="@lang('Direction...')" value="{{ old('direccion', $comunidad->direccion) }}" {{$btndisabled}} required>
                    @if ($errors->has('direccion'))
                    <span class="error-message">{{ $errors->first('direccion') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2">
                <!-- text input -->
                <div class="form-group">
                    <label for="cp"> @lang('Postal Code') </label>
                    <input type="text" name="cp" size="5" class="form-control" placeholder="@lang('Postal code...')" value="{{ old('cp', $comunidad->cp) }}" {{$btndisabled}} required>
                    @if ($errors->has('cp'))
                    <span class="error-message">{{ $errors->first('cp') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                    <label for="localidad"> @lang('Locality') </label>
                    <input type="text" name="localidad" maxlength="35" class="form-control" placeholder="@lang('Locality...')" value="{{ old('localidad', $comunidad->localidad) }}" {{$btndisabled}}>
                    @if ($errors->has('localidad'))
                    <span class="error-message">{{ $errors->first('localidad') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-sm-5">
                <!-- text input -->
                <div class="form-group">
                    <label for="provincia"> @lang('Province') </label>
                    <input type="text" name="provincia" class="form-control" placeholder="@lang('Province...')" value="{{ old('provincia', $comunidad->provincia) }}" {{$btndisabled}}>
                    @if ($errors->has('provincia'))
                    <span class="error-message">{{ $errors->first('provincia') }}</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="pais" class="form-label">@lang('Country')</label>
                    <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="pais" {{$btndisabled}}>
                        <option value="0">@lang('Country')</option>
                        @forelse($paises as $pais)
                        @if ( old('pais', $comunidad->pais) == $pais->codigoISO3 )
                        <option value="{{ $pais->codigoISO3 }}" selected > {{ $pais->nombre }} </option>
                        @else
                        <option value="{{ $pais->codigoISO3 }}"> {{ $pais->nombre }} </option>
                        @endif
                        @empty
                        <p>No hay paises</p>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="logo" value="{{old('observaciones', $comunidad->observaciones)}}" {{$btndisabled}}>
                        <label class="custom-file-label" for="exampleInputFile">@lang('Choose file')</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text" {{$btndisabled}}>@lang('Upload')</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                    <label>@lang('Observaciones')</label>
                    <textarea class="form-control" name="observaciones" rows="5" placeholder="Observaciones ..." value="{{old('observaciones', $comunidad->observaciones)}}" {{$btndisabled}}>{{old('observaciones', $comunidad->observaciones)}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>