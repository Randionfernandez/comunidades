<x-app-layout>
    
    @section('comunidadRole')
        <h5 class="text-white">{{ $comunidad->denom }}</h5>
        <h5 class="pl-3 pr-1 text-warning">{{ $comunidad->nombreRole($comunidad) }}</h5>
    @endsection
    
    @include('partials.plantillashoweditfirst')
        <div class="bg-white py-3 px-4 shadow rounded">
            <h1 class="display-4"> @lang('Denomination') {{ $comunidad->denom }} </h1>
            <hr>
            @include('comunidades._form',['title' => 'Show', 'btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
        </div>
    @include('partials.plantillashoweditend')

</x-app-layout>
