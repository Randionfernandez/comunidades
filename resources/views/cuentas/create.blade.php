<x-app-layout>
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{url('/cuentas')}}">
        <h1 class="display-4"> {{ __($title) }} </h1>
        <hr>
        @include('cuentas._form',['btnText1' => 'Save', 'btnText2' => 'Back'])
    </form>
    @include('partials.plantillashoweditend')
</x-app-layout>

