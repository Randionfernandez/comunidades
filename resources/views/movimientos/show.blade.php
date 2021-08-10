@extends('partials._formgeneral')

@section('header2')
     @lang('Movimiento Show')
@endsection

@section('content2')
    @include('movimientos._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
@endsection