@extends('layauts/plantilla')

@section('title','Distrubucion')

@section('content')
<h1 class="text-center m-40">Distribucion</h1>


<form action="{{ route('distribucion.store') }}" method="POST">
     @csrf

   @include('distribucion/form')
</form>
@endsection 