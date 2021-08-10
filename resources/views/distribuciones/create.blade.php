@extends('partials._formgeneral')

@section('header2')
    {{ __($title) }}
@endsection

@section('content2')
        <form method="POST" action="{{ route('distribuciones.store') }}">
            @include('distribuciones._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
        </form>
@endsection