@extends('layouts.plantillabase');
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection
{{-- <script>

	trigger: 'hover'
	$('[data-toggle="tooltip"]').tooltip({
	})
</script> --}}


@section('content')

{{-- <h1>Propietarios</h1> --}}
<a href="propiedad/create" class="btn btn-primary mb-3"> CREAR</a>
<table id="propiedades" class="table table-striped table-bordered shadow mt-4" style="width: 100">
	<thead class="bg-primary text-white">
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

				<form action="{{route('propiedad.destroy', $propiedad->id)}}" method="POST">
					<a href="/propiedad/{{ $propiedad->id }}/edit" class="btn btn-info">EDITAR</a>
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">ELIMINAR></button>

				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js
"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js
"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- activa el js sobre la tabla propiedades dentro de la vista y limita el paginador según estos criterios--}}
<script>
	$(document).ready(function() {
		$('#propiedades').DataTable({
			"lengthMenu": [[5,10,50,-1]],[5,10,50,"All"]]
		});
	} );
</script>

@endsection

@endsection