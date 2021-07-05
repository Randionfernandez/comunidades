<button class="btn btn-primary mx-5 mb-4 ">@lang('Save')</button>
<a href="{{url('distribuciones')}}" class="btn btn-danger mb-4 ">@lang('Back')</a>

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
        <input class="form-control" type="text" name="orden" placeholder="1" value="{{old('orden',$propiedades[0]['orden'])}}">
        <label class="form-label" for="numero">Numero ej. 1</label>
        @error('orden')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>

    <div class="col">
        <label class="form-label text-center" for="abreviatura">Abreviatura</label>
        <input class="form-control" type="text" name="abreviatura" placeholder="ABC" value="{{old('abreviatura',$propiedades[0]['abreviatura'])}}">
        <label for="letra">Letra Ej. ABC</label>
        @error('abreviatura')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>

    <div class="col">
        <label class="form-label text-center" for="nombre"> Nombre</label>
        <input class="form-control" type="text" name="nombre" placeholder="Trasteros" value="{{old('nombre',$propiedades[0]['nombre'])}}">
        <label for="general">Letras y numeros. Ej. General</label>
        @error('nombre')
        <br>
        {{$message}}
        <br>
        @enderror
    </div>
</div>

<table class="table col-md-11 mx-5 ">
    <thead>
        <tr class="text-white bg-dark">
            <th></th>
            <th></th>
            <th scope="col">Propiedad</th>
            <th colspan="col">Coeficiente</th>
        </tr>
    </thead>

    <tbody>

        @if ($propiedades->count())
        @forelse ($propiedades as $propiedad)
        <tr>
            <td><input type="hidden"  name="id[]" value="{{old('id[]', $propiedad->id)}}"></td>
            <td><input class="form-check-input" type="checkbox" name='checkbox[]' value="{{old('checkbox[]', $propiedad->id)}}" id="checkbox"></td>
            <td><input type="text" class="form-control" name="propiedad[]" value="{{ old('propiedad[]', $propiedad->id)}}" placeholder="{{$propiedad->name}}" readonly></td>
            <td><input type="text" class="form-control" name="coeficiente[]" value="{{old('coeficiente[]',$propiedad->coeficiente)}}" placeholder="0"></td>
        </tr>
        @empty
            @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Propiedades created yet'])
        @endforelse
        @else
        <tr>
            @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Propiedades created yet'])
        </tr>
        @endif

    </tbody>
</table>

