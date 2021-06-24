<div class="col-12 m-2">
    @auth
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ route($route1, $variable) }}">@lang('Edit')</a>
        <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-seleccion').submit()">@lang('Delete')</a>
        <a class="btn btn-secondary text-white" href='{{ route($route2) }}'>@lang('Back')</a>
        <form class="d-none" id='delete-seleccion' method="POST" action="{{ route($route3, $variable) }}">
            @csrf @method('DELETE')
        </form>
    </div>
    @endauth
</div>