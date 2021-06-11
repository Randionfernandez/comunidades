@extends('layouts.plantillabase');

@section('content');
<div class="uper">
    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>@lang('ID')</td>
                <td>@lang('Nombre')</td>
                <td>@lang('Apellido 1')</td>
                <td>@lang('Apellido 2')</td>
                <td>@lang('Email')</td>
                <td>@lang('Tipo')</td>
                <td>@lang('Fecha')</td>
                <td>@lang('Nif')</td>
                <td>@lang('Teléfono')</td>
                <td>@lang('Calle')</td>
                <td>@lang('Portal')</td>
                <td>@lang('Bloque')</td>
                <td>@lang('Escalera')</td>
                <td>@lang('Piso')</td>
                <td>@lang('Puerta')</td>
                <td>@lang('Codigo País')</td>
                <td>@lang('CP')</td>
                <td>@lang('Pais')</td>
                <td>@lang('Provincia')</td>
                <td>@lang('Localidad')</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->apellido1}}</td>
                <td>{{$user->apelido2}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->tipo}}</td>
                <td>{{$user->fecha}}</td>
                <td>{{$user->nif}}</td>
                <td>{{$user->telefono}}</td>
                <td>{{$user->calle}}</td>
                <td>{{$user->portal}}</td>
                <td>{{$user->bloque}}</td>
                <td>{{$user->escalera}}</td>
                <td>{{$user->piso}}</td>
                <td>{{$user->puerta}}</td>
                <td>{{$user->cod_pais}}</td>
                <td>{{$user->cp}}</td>
                <td>{{$user->pais}}</td>
                <td>{{$user->provincia}}</td>
                <td>{{$user->localidad}}</td>

                <td><a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('users.destroy', $user->id)}}" method="post" class="mb-0">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{ route('users.create')}}" class="btn btn-success">Añadir propietario</a>
    </div>
</div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection