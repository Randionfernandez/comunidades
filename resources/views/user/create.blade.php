@extends('layouts.plantilla')

@section('content')
<div class="card uper" style="margin-bottom: 4%;">
	<div class="card-header">
		<h1 class=" bg-light text-gray-700 text-center">Configuración Propietario</h1>
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
		<form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('user.store') }}">
			{{-- <input type="hidden" class="form-control" name="propiedad_id" value="{{ $propiedad->id }}" /> --}}
			@csrf
			<div class="form-group">
				<label for="name" class="form-label">Nombre</label>
				<input required  type="text" id="name" name="name" class="form-control" value="{{old('name')}}" required autofocus autocomplete="name" placeholder="Introduce el nombre..." />
				@error('name')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="apellido1" class="form-label">Apellido 1</label>
				<input required type="text" id="apellido1" name="apellido1" class="form-control" value="{{old('apellido1')}}" required autofocus autocomplete="apellido1" placeholder="Introduce el primer apellido..."/>
				@error('apellido1')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="apellido2" class="form-label">Apellido 2</label>
				<input required type="text" id="apellido2" name="apellido2" class="form-control" value="{{old('apellido2')}}" required autofocus autocomplete="apellido2" placeholder="Introduce el segundo apellido..."/>
				@error('apellido2')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="password" class="form-label">Contraseña</label>
				<input required type="password" id="password" name="password" class="form-control" value="{{ old('password') }}" placeholder="Introduce una clave de 9 dígitos..."/>
				@error('password')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="role" class="form-label">Role</label>
				<select  required class="form-select form-select-sm" id="role" name="role">
					<option value="admin" {{ old("role") == "admin" ? "selected" : "" }}>{{ ("Administrador") }}</option>
					<option value="invitado" {{ old("role") == "invitado" ? "selected" : "" }}>{{ ("Invitado") }}</option>
				</select>
			</div>

			<div class="form-group">
				<label for="dni" class="form-label">DNI</label>
				<input requied type="text" id="DNI" name="dni" class="form-control" value="{{old('nif')}}" required placeholder="Introduce el dni con letra..."/>
				@error('dni')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="email" class="form-label">Email</label>
				<input requied type="email" id="email" name="email" class="form-control" value=""/>
				@error('email')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="telefono" class="form-label">Telefono</label>
				<input required type="text" id="telefono" name="telefono" class="form-control" value="{{old('telefono')}}" required autofocus autocomplete="telefono" placeholder="Introduce el teléfono..."/>
				@error('telefono')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="num_cta" class="form-label">Nº de Cuenta</label>
				<input required type="text" id="num_cta" name="num_cta" class="form-control" value="{{old('num_cta')}}" placeholder="Introduce el IBAN..."/>
				@error('num_cta')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="card-header my-4">
				<h4 class="bg-light text-dark mt-3">Dirección para notificaciones</h4>
			</div>
			<div class="form-group">
				<label for="calle" class="form-label">Calle</label>
				<input required type="text" id="calle" name="calle" class="form-control" value="{{old('calle')}}" required autofocus autocomplete="" placeholder="Introduce la calle ..."/>

				@error('Calle')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="portal" class="form-label">Portal</label>
				<input required type="text" id="portal" name="portal" class="form-control" value="{{old('portal')}}" required autofocus autocomplete="" placeholder="Introduce el portal ..."/>

				@error('portal')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror

			</div>

			<div class="form-group">
				<label for="bloque" class="form-label">Bloque</label>
				<input required type="text" id="bloque" name="bloque" class="form-control" value="{{old('bloque')}}" required autofocus autocomplete="bloque" placeholder="Introduce el bloque..."/>
				@error('bloque')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="escalera" class="form-label">Escalera</label>
				<input required type="text" id="escalera" name="escalera" class="form-control" value="{{old('escalera')}}" required autofocus autocomplete="escalera" placeholder="Introduce la escalera ..."/>
				@error('escalera')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror

			</div>

			<div class="form-group">
				<label for="piso" class="form-label">Piso</label>
				<input required type="text" id="piso" name="piso" class="form-control" value="{{old('piso')}}" required autofocus autocomplete="piso" placeholder="Introduce el piso..."/>
				@error('piso')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="puerta" class="form-label">Puerta</label>
				<input required type="text" id="puerta" name="puerta" class="form-control" value="{{old('puerta')}}" required autofocus autocomplete="puerta" placeholder="Introduce puerta ..."
				/>
				@error('puerta')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="cod_pais" class="form-label">Codigo pais</label>
				<input required type="text" id="cod_pais" name="cod_pais" class="form-control" value="{{old('cod_pais')}}" required autofocus autocomplete="cod_pais" placeholder="Introduce el código de pais..."/>
				@error('cod_pais')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="cp" class="form-label">CP</label>
				<input required type="text" id="cp" name="cp" class="form-control" value="{{old('cod_pais')}}" required autofocus autocomplete="cod_pais" placeholder="Introduce el código de pais..."/>
				@error('cp')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="pais" class="form-label">Pais</label>
				<input required type="text" id="pais" name="pais" class="form-control" value="{{old('pais')}}" required autofocus autocomplete="pais" placeholder="Introduce el pais..."/>
				@error('pais')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror
			</div>

			<div class="form-group">
				<label for="provincia" class="form-label">Provincia</label>
				<input required type="text" id="provincia" name="provincia" class="form-control" value="{{old('provincia')}}" required autofocus autocomplete="" placeholder="Introduce la provincia ..."/>
				@error('provincia')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror

			</div>

			<div class="form-group">
				<label for="localidad" class="form-label">Localidad</label>
				<input required type="text" id="localidad" name="localidad" class="form-control" value="{{old('localidad')}}" required autofocus autocomplete="localidad" placeholder="Introduce la localidad..."/>
				@error('localidad')
				<div class="alert alert-danger mb-2" role="alert">
					{{ $message }}
				</div>
				@enderror

			</div>



			<button type="submit" class="btn btn-secondary mt-3">Agregar</button>
		</form>
	</div>
</div>
@endsection