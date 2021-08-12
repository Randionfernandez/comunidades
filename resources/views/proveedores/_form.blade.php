@csrf

@if($btndisabled != 'disabled')
<div class="btn-group">
    <button type="submit" class="btn btn-info">{{__($btnText1)}}</button>
    <button type="button" class="btn btn-danger" onclick="location.href ='{{route('proveedores.pasarComunidad', Session()->get('cmd_seleccionada'))}}'">{{__($btnText2)}}</button>
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

<div class="row">
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="nombre"> @lang('Name') </label>
            <input type="text" name="nombre" class="form-control" placeholder="@lang('Name...')" value="{{ old('nombre', $proveedor->nombre) }}" {{$btndisabled}} required>
            @if ($errors->has('nombre'))
            <span class="error-message">{{ $errors->first('nombre') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="apellidos"> @lang('Apellidos') </label>
            <input type="text" name="apellidos" class="form-control" placeholder="@lang('Apellidos...')" value="{{ old('apellidos', $proveedor->apellidos) }}" {{$btndisabled}}>
            @if ($errors->has('apellidos'))
            <span class="error-message">{{ $errors->first('apellidos') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <label for="persona"> @lang('Persona') </label>
        <div class="form-group">
            @forelse($personas as $persona)
            @php $checked = '' @endphp
            <div class="form-check">
                @if ( old('persona', $proveedor->persona) == $persona )
                @php $checked = 'checked' @endphp
                @endif
                <input class="form-check-input" type="radio" name="persona" value="{{$persona}}" {{$checked}} {{$btndisabled}}>
                <label class="form-check-label" for="persona">{{$persona}}</label>
            </div>
            @empty
            <p>@lang('No hay personas creadas')</p>
            @endforelse
        </div>
    </div>
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="doi"> @lang('DOI') </label>
            <input type="text" name="doi" class="form-control" placeholder="@lang('DOI...')" value="{{ old('doi', $proveedor->doi) }}" {{$btndisabled}} required>
            @if ($errors->has('doi'))
            <span class="error-message">{{ $errors->first('doi') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <label for="fechalta"> @lang('Fecha de Alta') </label>
        <div class="input-group date" id="reservationdate" data-target-input="nearest">
            <input type="text" name="fechalta" class="form-control datetimepicker-input" data-target="#reservationdate" value="{{ old('fechalta', $proveedor->fechalta) }}" {{$btndisabled}} required/>
            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
            </div>
        </div>
        @if ($errors->has('fechalta'))
        <span class="error-message">{{ $errors->first('fechalta') }}</span>
        @endif
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <label for="email">@lang('Email')</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" minlength="1" class="form-control" placeholder="@lang('Enter email')" value="{{old('email', $proveedor->email)}}" {{$btndisabled}}>
        </div>
    </div>
    <div class="col-sm-4">
        <label for="telefono1">@lang('Telefono 1')</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
            </div>
            <input type="tek" name="telefono1" minlength="8" maxlength="14" class="form-control" placeholder="@lang('Enter telephone 1')" value="{{old('telefono1', $proveedor->telefono1)}}" {{$btndisabled}} required>
        </div>
    </div>
    <div class="col-sm-4">
        <label for="telefono2">@lang('Telefono 2')</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-phone-alt"></i></span>
            </div>
            <input type="tel" name="telefono2" minlength="8" maxlength="14" class="form-control" placeholder="@lang('Enter telephone 2')" value="{{old('telefono2', $proveedor->telefono2)}}" {{$btndisabled}}>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <!-- text input -->
        <div class="form-group">
            <label for="dir_postal"> @lang('Direccion Postal') </label>
            <input type="text" name="dir_postal" maxlength="40" class="form-control" placeholder="@lang('Direccion Postal...')" value="{{ old('dir_postal', $proveedor->dir_postal) }}" {{$btndisabled}} required>
            @if ($errors->has('dir_postal'))
            <span class="error-message">{{ $errors->first('dir_postal') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="cp"> @lang('cp') </label>
            <input type="text" name="cp" size="5" class="form-control" placeholder="@lang('cp...')" value="{{ old('cp', $proveedor->cp) }}" {{$btndisabled}} required>
            @if ($errors->has('cp'))
            <span class="error-message">{{ $errors->first('cp') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <!-- text input -->
        <div class="form-group">
            <label for="localidad"> @lang('localidad') </label>
            <input type="text" name="localidad" maxlength="40" class="form-control" placeholder="@lang('localidad...')" value="{{ old('localidad', $proveedor->localidad) }}" {{$btndisabled}} required>
            @if ($errors->has('localidad'))
            <span class="error-message">{{ $errors->first('localidad') }}</span>
            @endif
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="pais" class="form-label">@lang('Country')</label>
            <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="pais" {{$btndisabled}}>
                <option value="0">@lang('Country')</option>
                @forelse($paises as $pais)
                @if ( old('pais', $proveedor->pais) == $pais->id )
                <option value="{{ $pais->codigoISO3 }}" selected > {{ $pais->nombre }} </option>
                @else
                <option value="{{ $pais->codigoISO3 }}"> {{ $pais->nombre }} </option>
                @endif
                @empty
                <p>@lang('No hay paises')</p>
                @endforelse
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="actividad" class="form-label">@lang('Activity')</label>
            <select class="form-control select2bs4" style="width: 100%" aria-label="Default select example" name="actividad" {{$btndisabled}}>
                <option value="0">@lang('Activity')</option>
                @forelse($actividades as $actividad)
                @if ( old('actividad', $proveedor->actividad) == trim($actividad->codigo) )
                <option value="{{$actividad->codigo}}" selected > {{$actividad->actividad}} </option>
                @else
                <option value="{{$actividad->codigo}}"> {{$actividad->actividad}} </option>
                @endif
                @empty
                <p>@lang('No hay actividades')</p>
                @endforelse
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
            <label for="iban"> @lang('Iban') </label>
            <input type="text" name="iban" size="24" class="form-control" placeholder="@lang('Iban...')" value="{{ old('iban', $proveedor->iban) }}" {{$btndisabled}} required>
            @if ($errors->has('iban'))
            <span class="error-message">{{ $errors->first('iban') }}</span>
            @endif
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <!-- textarea -->
        <div class="form-group">
            <label for="comentario">@lang('Comentario')</label>
            <textarea class="form-control" name="comentario" maxlength="40" rows="5" placeholder="Comentario..." value="{{old('comentario', $proveedor->comentario)}}" {{$btndisabled}}>{{old('comentario', $proveedor->comentario)}}</textarea>
            @if ($errors->has('comentario'))
            <span class="error-message">{{ $errors->first('comentario') }}</span>
            @endif
        </div>
    </div>
</div>