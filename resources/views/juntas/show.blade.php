@extends('partials._formgeneral')

@section('header2')
    @lang('Denomination') {{ $junta->denom_convocatoria }}
@endsection

@section('content2')
        @include('juntas._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
@endsection

@push('scripts')
    @include('partials.functions')
@endpush