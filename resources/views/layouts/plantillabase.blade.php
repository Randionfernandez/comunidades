<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

{{-- directiva para solo cargar el estilo datatable en las vistas y no sobrecargar --}}
@yield('css')

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <title>Comunidades</title>
</head>
<body>
 <div class="row bg-dark align-items-center m-0 sticky-top">
  <header>
    <div id="mobile-logo" class="col-md-1 pl-4 text-center">
      <a href="{{ url('/') }}">
        <img class="m-2" src="{{ asset('images/logo.png') }}" height="49px" width="50px">
      </a>
    </div>
    <div class="offset-md-4 col-md-2">
      <h3 class="text-light text-center m-auto">
        {{ config('app.name') }}
      </h3>
    </div>
    @if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
      @auth
      <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
      @else
      <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

      @if (Route::has('register'))
      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>

      @endif
      @endauth
    </div>
    @endif
  </header>
</div>
<div id="scroll" class="col bg-faded py-3 overflow-auto vh-100">
  @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>