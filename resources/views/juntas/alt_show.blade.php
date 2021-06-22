<x-app-layout>

    @include('partials.plantillashoweditfirst')
        <div class="bg-white py-3 px-4 shadow rounded">
            <h1 class="display-4"> @lang('Denomination') {{ $junta->denom_convocatoria }} </h1>
            <hr>

            @include('juntas._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
        </div>
    @include('partials.plantillashoweditend')

</x-app-layout>