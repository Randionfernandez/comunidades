@extends('layouts.plantilla')

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">
		<h1 class=" bg-light text-gray-700 text-center">Agregar Convocatoria</h1>
	</div>

	<div class="card-body">
		@if ($errors->any())
		<div class="alert alert-danger">
			<ul class="mb-0">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><br />
		@endif
		<form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('convocatoria.store') }}">
			{{-- <input type="hidden" class="form-control" name="propiedad_id" value="{{ $propiedad->id }}" /> --}}
			@csrf
			<div class="form-group">

			<div class="form-group">
				<label for="email" class="form-label">Convocados</label>
				<input required type="text" id="email" name="email" class="form-control" value="{{old('email')}}" required autofocus autocomplete="email" placeholder="Introduce el correo de la persona convocada..."/>
				@error('email')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="primera_conv" class="form-label">Apellido 2</label>
				<input required type="text" id="primera_conv" name="primera_conv" class="form-control" value="{{old('primera_conv')}}" required autofocus autocomplete="primera_conv" placeholder="Introduce la fecha de la priemra convocatoria..."/>
				@error('primera_conv')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>



			<div class="form-group">
				<label for="segunda_conv" class="form-label">segunda convocatoria</label>
				<input requied type="text" id="segunda_conv" name="segunda_conv" class="form-control" value="{{old('segunda_conv')}}" required placeholder="Introduce fecha 2º convocatoria..."/>
				@error('segunda_conv')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>



			<div class="form-group">
				<label for="user_email" class="form-label">Persona que convoca</label>
				<input required type="text" id="user_email" name="user_email" class="form-control" value="{{old('user_email')}}" required autofocus autocomplete="user_email" placeholder="Introduce el correo de quien convoca..."/>
				@error('user_email')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>



			<div class="form-group">
				<label for="orden_dia" class="form-label">orden dia</label>
				<input required type="text" id="orden_dia" name="orden_dia" class="form-control" value="{{old('orden_dia')}}" required autofocus autocomplete="" placeholder="Introduce el orden del dia ..."/>

				@error('orden_dia')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<button type="submit" class="btn btn-secondary mt-3">Agregar</button>
			<a href="/convocatoria" class="btn btn-secondary mt-3">Cancelar</a>
		</form>
	</div>
</div>
@endsection
