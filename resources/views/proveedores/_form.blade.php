@csrf

@if($btndisabled != 'disabled')
    <div class="btn-group">
        <button type="submit" class="btn btn-info">{{__($btnText1)}}</button>
        <button type="button" class="btn btn-danger" onclick="location.href='{{route('proveedores.pasarComunidad', Session()->get('cmd_seleccionada'))}}'">{{__($btnText2)}}</button>
    </div>
@else
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{route('proveedores.edit', $proveedor)}}">@lang('Edit')</a>
        <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-seleccion').submit()">@lang('Delete')</a>
        <a class="btn btn-secondary rounded-right text-white" href="{{route('proveedores.pasarComunidad', Session()->get('cmd_seleccionada'))}}">@lang('Back')</a>
        <form class="d-none" id='delete-seleccion' method="POST" action="{{route('proveedores.destroy', $proveedor)}}">
            @csrf @method('DELETE')
        </form>
    </div>
@endif

<x-jet-validation-errors></x-jet-validation-errors>

<div class="row form-group">
    <div class="col-6">
        <label for="nombre">@lang('nombre')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="35" name="nombre" placeholder=@lang('nombre') value="{{old('nombre', $proveedor->nombre)}}" {{$btndisabled}} required>
        @if ($errors->has('nombre'))
        <span class="error-message">{{$errors->first('nombre')}}</span>
        @endif
    </div>
    <div class="col-6">
        <label for="apellidos">@lang('apellidos')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="40" name="apellidos" placeholder=@lang('apellidos') value="{{old('apellidos', $proveedor->apellidos)}}" {{$btndisabled}}>
        @if ($errors->has('apellidos'))
        <span class="error-message">{{$errors->first('apellidos')}}</span>
        @endif
    </div>
</div>

<div class="row form-group">
    <div class="col-4">
        <div class="form-group">
            <label for="email">@lang('email')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="email" name="email" minlength="1" placeholder=@lang('email') value="{{old('email', $proveedor->email)}}" {{$btndisabled}}>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            <label for="telefono1">@lang('telefono1')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" name="telefono1" minlength="8" maxlength="14" placeholder=@lang('telefono1') value="{{old('telefono1', $proveedor->telefono1)}}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            <label for="telefono2">@lang('telefono2')</label>
            <input class="form-control border-0 bg-light shadow-sm" type="text" name="telefono2" minlength="8" maxlength="14" placeholder=@lang('telefono2') value="{{old('telefono2', $proveedor->telefono2)}}" {{$btndisabled}}>
        </div>
    </div>
</div>


<div class="row form-group">
    <div class="col-4">
        <label for="persona">@lang('Persona')</label>
        <select class="form-select" aria-label="Default select example" name="persona" {{$btndisabled}}>
            <option value="0">@lang('Persona')</option>
            @forelse($personas as $persona)
            @if ( old('persona', $proveedor->persona) == $persona)
            <option value="{{$persona}}" selected > {{$persona}} </option>
            @else
            <option value="{{$persona}}"> {{$persona}} </option>
            @endif
            @empty
            <p>No hay personas</p>
            @endforelse
        </select>
    </div>
    <div class="col-4">
        <label for="fechalta">@lang('Create Date')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="date" name="fechalta" placeholder=@lang('fechalta') value="{{old('fechalta', $proveedor->fechalta)}}" {{$btndisabled}} required>
    </div>
    <div class="col-4">
        <label for="doi">@lang('doi')</label>
        <input class="form-control border-0 bg-light shadow-sm" type="text" maxlength="9" name="doi" placeholder=@lang('doi') value="{{old('doi', $proveedor->doi)}}" {{$btndisabled}} required>
    </div>
</div>

<div class="panel panel-default top-spaced">
    <div class="panel-heading ng-binding">
        <b>@lang('Notifications address')</b>
        <hr>
    </div>
    <div class="panel-body">
        <div class="row form-group">
            <div class="col-3">
                <label for="dir_postal">@lang('Direccion Postal')</label>
                <input class="form-control border-0 bg-light shadow-sm" type="string" name="dir_postal" max="40" placeholder=@lang('dir_postal') value="{{old('dir_postal', $proveedor->dir_postal)}}" {{$btndisabled}} required>
            </div>
            <div class="col-3">
                <label for="pais">@lang('Country')</label>
                <select class="form-select" aria-label="Default select example" name="pais" {{$btndisabled}}>
                    <option value="0">@lang('Country')</option>
                    @forelse($paises as $pais)
                    @if ( old('pais', $proveedor->pais) == $pais->codigoISO3)
                    <option value="{{$pais->codigoISO3}}" selected > {{$pais->nombre}} </option>
                    @else
                    <option value="{{$pais->codigoISO3}}"> {{$pais->nombre}} </option>
                    @endif
                    @empty
                        <p>No hay paises</p>
                    @endforelse
                </select>
            </div>
            <div class="col-3">
                <label for="localidad">@lang('Localidad')</label>
                <input class="form-control border-0 bg-light shadow-sm" type="string" name="localidad" max="35" placeholder=@lang('localidad') value="{{old('localidad', $proveedor->localidad)}}" {{$btndisabled}} required>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="cp">@lang('cp')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="cp" size="5" maxlength="5" placeholder=@lang('cp') value="{{old('cp', $proveedor->cp)}}" {{$btndisabled}} required>
                </div>
            </div>
        </div>
        
        <div class="row form-group">
            <div class="col-4">
                <label for="actividad">@lang('Actividad')</label>
                <select class="form-select" aria-label="Default select example" name="actividad" {{$btndisabled}}>
                    <option value="0">@lang('Actividad')</option>
                    @forelse($actividades as $actividad)
                    @if ( trim(old('actividad', $proveedor->actividad)) == trim($actividad->codigo))
                    <option value="{{$actividad->codigo}}" selected > {{$actividad->actividad}} </option>
                    @else
                    <option value="{{$actividad->codigo}}"> {{$actividad->actividad}} </option>
                    @endif
                    @empty
                        <p>No hay actividades</p>
                    @endforelse
                </select>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="iban">@lang('Iban')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="iban" size="24" maxlength="34" placeholder=@lang('iban') value="{{old('iban', $proveedor->iban)}}" {{$btndisabled}} required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="comentario">@lang('Comentario')</label>
                    <input class="form-control border-0 bg-light shadow-sm" type="text" name="comentario" maxlength="40" placeholder=@lang('comentario') value="{{old('comentario', $proveedor->comentario)}}" {{$btndisabled}} required>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>