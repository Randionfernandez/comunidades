<x-app-layout>
    @include('partials.plantillashoweditfirst')
    <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('proveedores.update', $proveedor) }}">
        @csrf @method('PATCH')
        <h1 class="display-4"> @lang('Editar proveedor') </h1>
        <hr>
        @include('proveedores._form', ['btnText1' =>'Update', 'btnText2' => 'Cancel'])
    </form>
    @include('partials.plantillashoweditend')
</x-app-layout>