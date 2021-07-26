<x-app-layout>
    
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4clear shadow rounded" method="POST" action="{{ route('cuentas.update',$cuenta) }}">
        @method('PATCH')
        <h1 class="display-4"> {{ __($title) }} </h1>
        <hr>
        @include('cuentas._form', ['btnText1' => $btnText1, 'btnText2' => $btnText2, 'btndisabled' => $btndisabled])
    </form>
    @include('partials.plantillashoweditend')
    
</x-app-layout>

