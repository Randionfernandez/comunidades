@extends('layouts.plantillabase');

@section('content');
<h2>EDITAR PROPIEDADES</h2>
<form action="/propiedad/{{propiedad->id}}" method="POST">

	@csrf
	@method('PUT')
	{{-- <div class="mb-3">
		<label for="" class="form-label">ID</label>
		<input id="id" type="number" name="id" class="form-control" tabindex="1" value="{{propiedad->id}}">
	</div> --}}
	<div class="mb-3">
		<label for="" class="form-label">COMUNIDAD</label>
		<input id="comunidad" type="number" name="comunidades_id" class="form-control" tabindex="2" value="{{propiedad->comunidades_id}}">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">PROPIETARIO</label>
		<input id="users_id" type="number" name="users_id" class="form-control" tabindex="3" value="{{propiedad->users_id}}">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">PARTE</label>
		<input id="parte" type="number" name="parte" class="form-control" tabindex="4" value="{{propiedad->tipo}}">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">COEFICIENTE</label>
		<input id="coeficiente" type="number" name="coeficiente" class="form-control" tabindex="5" value="{{propiedad->coeficiente}}">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">TIPO</label>
		<input id="tipo" type="text" name="tipo" class="form-control" tabindex="6" value="{{propiedad->tipo}}">
	</div>
	<div class="mb-3">
		<label for="" class="form-label">OBSERVACIONES</label>
		<input id="" type="text"  placeholder="Planta, nº..etc" name="observaciones" class="form-control" tabindex="7" value="{{propiedad->observaciones}}">
	</div>
	<a href="/propiedad" class="btn btn-secondary" tabindex="8">CANCELAR</a>
	<button type="submit" class="btn btn-primary" tabindex="9">GUARDAR</button>
</form>
@endsection