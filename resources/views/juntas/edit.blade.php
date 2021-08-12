@extends('partials._formgeneral')

@section('header2')
    {{ __($title) }}
@endsection

@section('content2')
        <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('juntas.update', $junta) }}">
            @method('PATCH')
            @include('juntas._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
        </form>
@endsection

@push('scripts')
    @include('partials.functions')
@endpush