@extends('layauts/plantilla')

@section('title','Editar Distrubucion')


@section('content')
<h1 class="text-center m-40">Editar Distribucion</h1>

<form action="{{route('distribucion.update',$propietarios[0]['nombre'])}}" method="post">
    @csrf
    @method('PUT')

    <button class="btn btn-primary mx-5 mb-4 ">Editar</button>
    <a href="{{url('distribucion')}}" class="btn btn-primary mb-4 ">Volver</a>

        @if($errors->any())
        
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error}}
            
        </div>
        
        @endforeach

    @endif


    @if (session ('mensaje'))
    <div class="alert alert-danger  alert-dismissible fade show" role="alert">
    {{ session('mensaje') }}
    
    </div>
    @endif

    <div class="row col-md-11 mx-5 mb-4">
        <div class="col">
        <label class="form-label text-center" for="orden">Orden</label>
        <input class="form-control" type="text" name="orden" placeholder="1" value="{{$propietarios[0]['orden']}}">
        <label class="form-label" for="numero">Numero ej. 1</label>
        @error('orden')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    
    <div class="col">
        <label class="form-label text-center" for="abreviatura">Abreviatura</label>
        <input class="form-control" type="text" name="abreviatura" placeholder="A" value="{{$propietarios[0]['abreviatura']}}">
        <label for="letra">Letra Ej. A</label>
        @error('abreviatura')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    
    <div class="col">
        <label class="form-label text-center" for="nombre">Nombre(es)</label>
        <input class="form-control" type="text" name="nombre" placeholder="Trasteros" value="{{$propietarios[0]['nombre']}}">
        <label for="general">Letras y numeros. Ej. General</label>
        @error('nombre')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    </div>  

<table class="table table-hover dt-responsive nowrap mx-5 " id="editarDistribucion">
    <thead>
        <tr>
            <th colspan="col"></th>
            <th colspan="col">Propiedades</th>
            <th colspan="col">Coeficiente</th>
        </tr>
    </thead>
    <tbody>

   
    @foreach ($propietarios as $propietario)
    <tr>
        <td><input type="hidden"  name="id[]" value="{{$propietario->id}}"></td>
        <td><input type="text"  name="propiedad[]" value="{{$propietario->propiedad}}"></td>
        <td><input type="text"  name="coeficiente[]" value="{{$propietario->coeficiente}}"></td>

    </tr>
    @endforeach    
    


    </tbody>
</table>
</form>
@endsection



 