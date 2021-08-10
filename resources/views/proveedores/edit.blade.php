@extends('partials._formgeneral')

@section('header2')
    @lang('Editar proveedor')
@endsection

@section('content2')
    <form method="POST" action="{{ route('proveedores.update', $proveedor) }}">
        @method('PATCH')
        @include('proveedores._form', ['btnText1' =>'Update', 'btnText2' => 'Cancel'])
    </form>
@endsection