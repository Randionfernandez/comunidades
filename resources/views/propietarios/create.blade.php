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





    </div>
</div>
@endsection