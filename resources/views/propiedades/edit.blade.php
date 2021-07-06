<x-app-layout>
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('propiedades.update', $propiedad) }}">
        @csrf @method('PATCH')
        <h1 class="display-4"> @lang('Edit Property') </h1>
        <hr>
        @include('propiedades._form', ['btnText1' =>$btnText1, 'btnText2' => $btnText2])
    </form>
    @include('partials.plantillashoweditend')
</x-app-layout>