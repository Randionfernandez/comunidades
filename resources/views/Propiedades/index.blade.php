{{-- @extends('layouts.plantillabase');
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection
<script>

	trigger: 'hover'
	$('[data-toggle="tooltip"]').tooltip({
	})
</script>


@section('content')

 <h1>Propietarios</h1>
 --}}
 @extends('adminlte::page')

 @section('title', 'PROPIEDADES')

 @section('content_header')
 <h1>PROPIEDADES</h1>
 @stop

 @section('content')
 <div class="card uper" style="margin-bottom: 4%;">
 	<div class="card-header">

 		<h1 class=" bg-light text-gray-700 text-center">
 			<a href="propiedades/create" class="pull-left btn btn-white m-3"><span class="fa fa-user-plus">
 			</span></a>Propiedades registradas</h1>
 		</div>

 		<div class="cardbody">

 			<div class="uper table-responsive">
 				@if(session()->get('success'))
 				<div class="alert2 alert-success">
 					{{ session()->get('success') }}
 				</div><br />
 				@endif
 				<a href="propiedad/create" class="btn btn-primary mb-3"> CREAR</a>
 				<table id="propiedades" class="table table-striped table-bordered shadow mt-4" style="width: 100">
 					<thead class="bg-primary text-white">
 						<thead class="table-secondary ">
 							<tr>
 								<tr>
 									<th scope="col">ID</th>
 									<th scope="col">COMUNIDAD</th>
 									<th scope="col">PROPIETARIO</th>
 									<th scope="col">PARTE</th>
 									<th scope="col">COEFICIENTE</th>
 									<th scope="col">TIPO</th>
 									<th scope="col">OBSERVACIONES</th>

 								</tr>
 							</thead>
 							<tbody>
 								@foreach($propiedades as $propiedad)
 								<tr>
 									<td>{{ $propiedad->id }}</td>
 									<td>{{ $propiedad->comunidad_id }}</td>
 									<td>{{ $propiedad->users_id }}</td>
 									<td>{{ $propiedad->parte }}</td>
 									<td>{{ $propiedad->coeficiente }}</td>
 									<td>{{ $propiedad->tipo }}</td>
 									<td>{{ $propiedad->observaciones  }}</td>
 									<td>
 										<a href="/propiedad/{{$propiedad->id}}/edit" class="btn btn-info">Editar</a>
 									</td>
 									<td>
 										<form class="" action="{{route('propiedad.destroy', $propiedad->id)}}" method="POST">
 											@csrf
 											@method('DELETE')
 											<button type="submit" class="btn btn-danger">Eliminar</button>
 										</form>
 									</td>

 								</tr>
 								@endforeach
 							</tbody>
 						</table>
{{-- @section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js
"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

activa el js sobre la tabla propiedades dentro de la vista y limita el paginador según estos criterios--}}
{{-- <script>
	$(document).ready(function() {
		$('#propiedades').DataTable({
			"lengthMenu": [[5,10,50,-1]],[5,10,50,"All"]]
		});
	} );
</script>

@endsection

@endsection  --}}
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
		$('#propiedades').DataTable();
	} );
</script>

@stop