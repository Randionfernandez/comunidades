@extends('adminlte.layout') @section('content')
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{url('/cuentas')}}">
        <h1 class="display-4"> {{ __($title) }} </h1>
        <hr>
        @include('cuentas._form',['btnText1' => $btnText1, 'btnText2' => $btnText2])
    </form>
    @include('partials.plantillashoweditend')
@endsection

