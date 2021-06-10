@extends('layauts/plantilla')

@section('title','Editar Distrubucion')


@section('content')
<h1 class="text-center m-40">Editar Distribucion</h1>

<form action="{{route('distribucion.update',$propietarios[0]['nombre'])}}" method="post">
    @csrf
    @method('PUT')
    @include('distribucion/form')
</form>
@endsection



 