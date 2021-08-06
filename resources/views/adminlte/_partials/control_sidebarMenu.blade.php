<div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
</div>
<div class="p-3">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('comunidades.index') }}"
               >@lang('Comunidades')</a>
        </li>

        @auth
        <li class="nav-item">
            <a class="nav-link"
               href="#"
               onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();"
               >Cerrar sesión</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @else
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('login') }}"
               >Login</a>
        </li>
        @endauth
    </ul>
</div>