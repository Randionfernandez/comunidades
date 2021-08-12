{{-- @extends('layouts.plantilla')

{{-- uso de datatables
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@endsection --}}

@extends('adminlte::page')

@section('title', 'PROPIETARIOS EN ACTIVO')

@section('content_header')
    <h1>CONFIGURACION</h1>
@stop

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">

		<h1 class=" bg-light text-gray-700 text-center">
		<a href="user/create" class="pull-left btn btn-white m-3"><span class="fa fa-user-plus">
							</span></a>Propietarios en Activo</h1>
	</div>

<div class="cardbody">

	<div class="uper table-responsive">
		@if(session()->get('success'))
		<div class="alert2 alert-success">
			{{ session()->get('success') }}
		</div><br />
		@endif
		<table id="users" class="table table-light text-gray-700 table-striped table-bordered
		table-hover shadow-lg text-nowrap mt-4" style="width:100%">
			<thead class="table-secondary ">
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

{{--{{ $users->links() }} --}}
</div>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
{{--       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script >
$(document).ready(function() {
    $('#users').DataTable();
} );
</script>

@stop

{{-- @endsection

@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
<script >
$(document).ready(function() {
    $('#users').DataTable();
} );
</script>


@endsection --}}