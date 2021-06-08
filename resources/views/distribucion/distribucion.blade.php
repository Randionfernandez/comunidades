<x-app-layout>

@section('title','Distribucion')

@section('content')
@if (! $unidadRegistral == null)
<h1 class="text-center m-40">Distribucion</h1>


<form action="{{ route('distribucion.store') }}" method="POST">
     @csrf

    <button class="btn btn-primary mx-5 mb-4 ">Guardar</button>
    <a href="{{url('distribucion')}}" class="btn btn-danger mb-4 ">Volver</a>

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
        <input class="form-control" type="text" name="orden" placeholder="1" value="{{old('orden')}}">
        <label class="form-label" for="numero">Numero ej. 1</label>
        @error('orden')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    
    <div class="col">
        <label class="form-label text-center" for="abreviatura">Abreviatura</label>
        <input class="form-control" type="text" name="abreviatura" placeholder="A" value="{{old('abreviatura')}}">
        <label for="letra">Letra Ej. A</label>
        @error('abreviatura')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    
    <div class="col">
        <label class="form-label text-center" for="nombre">Nombre(es)</label>
        <input class="form-control" type="text" name="nombre" placeholder="Trasteros" value="{{old('nombre')}}">
        <label for="general">Letras y numeros. Ej. General</label>
        @error('nombre')
            <br>
            {{$message}}
            <br>
        @enderror
    </div>
    </div>  

    <table class="table col-md-11">
        <thead>
            <tr class="text-white bg-dark">
                <th>
                
                </th>
                <!--<th colspan="col">Propietarios</th>-->
                <th scope="col">Propiedad</th>
                <th colspan="col">Coeficiente</th>
                <th colspan="col">Unidad Registral</th>

            </tr>
        </thead>

        <tbody>
            
            @if ($propietarios -> count() )
             @foreach ($propietarios as $propietario)
            <tr>
                <td><input class="form-check-input" type="checkbox" name='checkbox[]' value="{{$propietario->propiedad}}" id="checkbox"></td>
                <!--<td><input type="text" class="form-control" name="propietario[]" value="{{ $propietario -> nombre }}"> </td>-->
                <td><input type="text" class="form-control" name="propiedad[]" value="{{$propietario->propiedad}}"></td> 
                <td><input type="text" class="form-control" name="coeficiente[]" placeholder="0" value="{{ old('coeficiente[]') }}"> </td> 
                <td><input type="text" class="form-control" name="unidadRegistral[]" value="{{$unidadRegistral}}" placeholder="0"></td>  
            </tr>
            @endforeach
            @else
                <tr>
                    <td>No hay Propietarios</td>
                </tr>
            @endif
            
        </tbody>
    </table>
    @else
    <a href="{{url('distribucion')}}" class="btn btn-danger mb-4 ">Volver</a>
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay Propietarios'])
    @endif

</form>
</x-app-layout>