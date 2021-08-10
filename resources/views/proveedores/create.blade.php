@extends('partials._formgeneral')

@section('header2')
    {{ __($title) }}
@endsection

@section('content2')
        <form method="POST" action="{{ route('proveedores.store') }}">
            @include('proveedores._form', ['btnText1' =>'Save', 'btnText2' => 'Cancel'])
        </form>
@endsection