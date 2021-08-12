@extends('partials._formgeneral')

@section('header2')
    @lang('Edit Property')
@endsection

@section('content2')
        <form  method="POST" action="{{ route('propiedades.update', $propiedad) }}">
            @method('PATCH')
            @include('propiedades._form', ['btnText1' =>$btnText1, 'btnText2' => $btnText2])
        </form>
@endsection

@push('scripts')
    @include('comunidades.functions')
@endpush