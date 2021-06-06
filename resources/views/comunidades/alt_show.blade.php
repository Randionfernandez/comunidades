<x-app-layout>

    @section('title')
    {{ __('Community Show | ') . $comunidad->denom }}
    @endsection



    <div class="bg-white p-5 shadow rounded">

        <div class="col-12">
            @auth
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a class="btn btn-primary" href="{{ route('comunidades.edit', $comunidad) }}">@lang('Edit')</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-comunidad').submit()">@lang('Eliminate')</a>
                <a class="btn btn-secondary text-white" href='{{ route('comunidades.index') }}'>@lang('Back')</a>
            </div>
            
            <form class="d-none" id="delete-comunidad" method="POST" action="{{ route('comunidades.destroy', $comunidad) }}">
                @csrf @method('DELETE')
            </form>
            @endauth
        </div>

        <h3>@lang('Denomination') {{ $comunidad->denom }}</h3>

        @include('comunidades._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])

    </div>

</x-app-layout>
