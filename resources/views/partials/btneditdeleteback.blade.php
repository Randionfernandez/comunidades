<div class="col-12 m-2">
    @auth
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <a class="btn btn-primary" href="{{ route($route1, $variable) }}">@lang('Edit')</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
            @lang('Delete')
        </button>
        <a class="btn btn-secondary text-white" href='{{ route($route2) }}'>@lang('Back')</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">@lang('Delete')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('¿Seguro que quiere eliminar?')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-seleccion').submit()">@lang('Delete')</a>
                    <form class="d-none" id='delete-seleccion' method="POST" action="{{ route($route3, $variable) }}">
                        @csrf @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth
</div>
