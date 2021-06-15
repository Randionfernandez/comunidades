<x-app-layout>

    @section('title')
    {{ __('Junta Show | ') . $junta->denom_convocatoria }}
    @endsection



    <div class="bg-white p-5 shadow rounded">

        <div class="col-12">
            @auth
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                <a class="btn btn-primary" href="{{ route('juntas.edit', $junta) }}">@lang('Edit')</a>
                <a class="btn btn-danger" href="#" onclick="document.getElementById('delete-junta').submit()">@lang('Eliminate')</a>
                <a class="btn btn-secondary text-white" href='{{ route('juntas.index') }}'>@lang('Back')</a>
            </div>
            
            <form class="d-none" id="delete-junta" method="POST" action="{{ route('juntas.destroy', $junta) }}">
                @csrf @method('DELETE')
            </form>
            @endauth
        </div>

        <h3>@lang('Denomination') {{ $junta->denom_convocatoria }}</h3>

        @include('juntas._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])

    </div>

</x-app-layout>