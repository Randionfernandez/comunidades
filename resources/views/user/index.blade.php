@extends('layouts.plantilla')

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">

		<h1 class=" bg-light text-gray-700 text-center">
		<a href="user/create" class="pull-left btn btn-white m-3"><span class="fa fa-user-plus">
							</span></a>Propietarios en Activo</h1>
	</div>

	<div class="uper table-responsive">
		@if(session()->get('success'))
		<div class="alert2 alert-success">
			{{ session()->get('success') }}
		</div><br />
		@endif
		<table class="table table-light text-gray-700 table-striped text-nowrap mt-4">
			<thead>
				<tr>
					<th scope="col">@lang('ID')</th >
					<th scope="col">@lang('Nombre')</th >
					<th scope="col">@lang('Apellido 1')</th >
					<th scope="col">@lang('Apellido 2')</th >
					<th scope="col" class="ms-4">@lang('Email')</th >
					<th scope="col">@lang('Role')</th >
					{{-- <th scope="col">@lang('Fecha')</th > --}}
					<th scope="col">@lang('Nif')</th >
					<th scope="col">@lang('Teléfono')</th >
					<th scope="col">@lang('Calle')</th >
					<th scope="col">@lang('Portal')</th >
					<th scope="col">@lang('Bloque')</th >
					<th scope="col">@lang('Escalera')</th >
					<th scope="col">@lang('Piso')</th >
					<th scope="col">@lang('Puerta')</th >
					<th scope="col">@lang('Codigo País')</th >
					<th scope="col">@lang('CP')</th >
					<th scope="col">@lang('Pais')</th >
					<th scope="col">@lang('Provincia')</th >
					<th scope="col">@lang('Localidad')</th >
					<th scope="col"><span class="fa fa-cogs ms-4"></span></th >
					<th scope="col"><span class="fa fa-eraser ms-4"></span></th >
				</tr>

			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
					{{-- <td>  {{dd($user)}}  </td> --}}
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->apellido1}}</td>
					<td>{{$user->apellido2}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->role}}</td>
					{{-- <td>{{$user->fecha}}</td> --}}
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
					<td>
						<a href="/user/{{$user->id}}/edit" class="btn btn-info">Editar</a>
					</td>
					<td>
						<form class="" action="{{route('user.destroy',$user->id)}}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger">Eliminar</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

	</div>

{{ $users->links() }}
</div>


@endsection