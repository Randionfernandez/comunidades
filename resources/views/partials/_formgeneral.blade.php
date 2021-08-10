@extends('adminlte.layout')

@section('header')
    <div class="card card-primary mb-0">
        <div class="card-header">
            <h3 class="card-title"> @yield('header2') </h3>
        </div>
@endsection

@section('content')
    <div class="card-body bg-white">
        @yield('content2')
    </div>
    </div>
@endsection