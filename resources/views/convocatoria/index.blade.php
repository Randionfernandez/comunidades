@extends('layouts.plantilla')

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">

		<h1 class=" bg-light text-gray-700 text-center">
			<a href="convocatoria/create" class="pull-left btn btn-white m-3"><span class="fa fa-convocatoria-plus">
			</span></a>Convocatorias</h1>
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
						<th scope="col">@lang('Convocados')</th >
						<th scope="col">@lang('Fecha 1º convocatoria')</th >
						<th scope="col">@lang('Fecha 2º convocatoria')</th >
						<th scope="col">@lang('Persona que convoca')</th >
						<th scope="col">@lang('Orden del día')</th >

					</tr>

				</thead>
				<tbody>
					@foreach($convocatorias as $convocatoria)
					<tr>
						{{-- <td>  {{dd($convocatoria)}}  </td> --}}
						<td>{{$convocatoria->id}}</td>
						<td>{{$convocatoria->email}}</td>
						<td>{{$convocatoria->primera_conv}}</td>
						<td>{{$convocatoria->segunda_conv}}</td>
						<td>{{$convocatoria->user_email}}</td>
						<td>{{$convocatoria->orden_dia}}</td>
						<td>
							<a href="/convocatoria/{{$convocatoria->id}}/edit" class="btn btn-info">Editar</a>
						</td>
						<td>
							<form class="" action="{{route('convocatoria.destroy',$convocatoria->id)}}" method="POST">
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

		{{ $convocatorias->links() }}
	</div>


	@endsection