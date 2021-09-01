@extends('partials._formgeneral')

@section('header2')
{{ __($title) }}
@endsection

@section('content2')
<form method="POST" id="create-comunidad" enctype="multipart/form-data" action="{{ route('comunidades.store') }}">
    @include('comunidades._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
</form>
@endsection

@push('scripts')
    @include('partials.functions')
    <!-- bs-custom-file-input -->
    <script src="/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

    <!-- Page specific script -->
    <script>
    $(function () {
        bsCustomFileInput.init();
    });
    </script>
@endpush