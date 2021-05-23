@extends('layouts.dashboard')


@section('content')

<div class="card uper">
    <div class="card-header">
        Añadir propiedad
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

   <form method="post" action="{{ route('propiedades.store') }}">
            <div class="form-group">
                @csrf
                <label for="cad_ref_com">Referencia catastral</label>

         <input type="text" class="form-control" name="cad_ref_com" />
            </div>
            <div class="form-group">
                <label for="address">Dirección</label>
                <input type="text" class="form-control" name="address" />

     </div>
            <div class="form-group">

         <label for="apart_num">Numero de apartamentos</label>

          <input type="number" class="form-control" name="apart_num" />

    </div>

     <button type="submit" class="btn btn-primary">Añadir propiedad</button>

    </form>
    </div>

</div>

<script src="{{ asset('js/app.js') }}" type="text/js"></script>

@endsection