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
<div class="offset-md-3 col-md-2 text-center">
    <nav id="mobile-login" class="navbar navbar-dark justify-content-around">
        @if (Route::has('login'))

        @auth
        <a class="navbar-brand p-0" href="{{ route('users.edit', Auth::id()) }}">Dashboard</a>

        <a class="navbar-brand p-0" href="{{ route('logout') }}"  data-toggle="modal" data-target="#exampleModal">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <a class="navbar-brand p-0" href="{{ route('login') }}">Login</a>

        @if (Route::has('register'))
        <a class="navbar-brand p-0" href="{{ route('register') }}">Registrarse</a>
        @endif
        @endauth

        @endif
    </nav>
</div>

