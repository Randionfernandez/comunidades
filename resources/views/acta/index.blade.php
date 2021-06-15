@extends('layouts.plantilla')

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">

		<h1 class=" bg-light text-gray-700 text-center">
			<a href="acta/create" class="pull-left btn btn-white m-3"><span class="fa fa-acta-plus">
			</span></a>Actas</h1>
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
						<th scope="col">@lang('Presentes')</th >
						<th scope="col">@lang('Representados')</th >
						<th scope="col">@lang('Acuerdos adoptados')</th >
					</tr>

				</thead>
				<tbody>
					@foreach($actas as $acta)
					<tr>
						{{-- <td>  {{dd($acta)}}  </td> --}}
						<td>{{$acta->id}}</td>
						<td>{{$acta->presentes}}</td>
						<td>{{$acta->representados}}</td>
						<td>{{$acta->acuerdos}}</td>
						<td>
							<a href="/user/{{$acta->id}}/edit" class="btn btn-info">Editar</a>
						</td>
						<td>
							<form class="" action="{{route('user.destroy',$acta->id)}}" method="POST">
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

		{{ $actas->links() }}
	</div>


	@endsection