@extends('adminlte.layout') @section('content')
    
    @include('partials.plantillashoweditfirst')
        <div class="bg-white py-3 px-4 shadow rounded">
            <h1 class="display-4"> {{ __($title) }} </h1>
            <hr>
            @include('cuentas._form',['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
        </div>
    @include('partials.plantillashoweditend')
    
@endsection

