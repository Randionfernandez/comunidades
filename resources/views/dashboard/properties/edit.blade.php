@extends('layouts.dashboard')


@section('content')

@if(session()->get('success'))

<div class="alert alert-success">
    {{ session()->get('success') }}
</div><br />

@endif
<div class="card scroll-card">
    <div class="card-header">
        Actualizar propiedad
    </div>
    <div class="card-body pb-0">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('propiedades.update', $property->id) }}">
            <div class="form-group">
                @csrf
                @method('PUT')
                <label for="cad_ref_com">Referencia catastral</label>
                <input type="text" class="form-control" name="cad_ref_com" value="{{ $comunidad->ref }}" />
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address" value="{{ $community->direccion }}" />
            </div>
            <div class="form-group">
                <label for="apart_num">Numero de apartamentos</label>
                <input type="number" class="form-control" name="apart_num" value="{{ $propiedad->apart_num }}" />
            </div>
            <button type="submit" class="btn btn-primary">Actualizar propiedad</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
@endsection