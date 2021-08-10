@extends('partials._formgeneral')

@section('header2')
     @lang('Provider Show | ') {{ $proveedor->nombre }}
@endsection

@section('content2')
    @include('proveedores._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
@endsection