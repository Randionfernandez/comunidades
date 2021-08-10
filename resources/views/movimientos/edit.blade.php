@extends('partials._formgeneral')

@section('header2')
    {{ __($title) }}
@endsection

@section('content2')
        <form method="POST" action="{{ route('movimientos.update', $movimiento) }}">
            @method('PATCH')
            @include('movimientos._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled, 'tiposGastos' => $tiposGastos])
        </form>
@endsection