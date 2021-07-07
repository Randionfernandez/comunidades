<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('includes.head')
 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
@yield('css')

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>GOLMAR FINCAS</title>
  </head>
  <body>


   <!--  <h1 class=" bg-light text-gray-700 text-center">Dashboard</h1> -->

<div class="content">
@yield('content')
</div>


  <!-- Scripts -->
@yield('js')
  {{-- muestra los iconos --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<footer class="fixed-bottom bg-secondary text-center py-3">
  {{ config('app.name') }} | Copyright @ {{ date('Y') }}
</footer>

  </body>
</html>