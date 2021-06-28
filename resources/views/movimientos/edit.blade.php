<x-app-layout>
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('movimientos.update', $movimiento) }}">
        @method('PATCH')
        <h1 class="display-4"> {{ __($title) }} </h1>
        <hr>
        @include('movimientos._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled, 'tiposGastos' => $tiposGastos])
    </form>
    @include('partials.plantillashoweditend')
</x-app-layout>