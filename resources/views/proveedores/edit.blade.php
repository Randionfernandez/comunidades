<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight text-center">
            {{ __('Editar proveedores') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 col-lg-10 mx-auto">

                <form class="bg-white py-3 px-4 shadow rounded" method="POST" action="{{ route('proveedores.update', $proveedor) }}">
                    @csrf @method('PATCH')

                    <h1 class="display-4"> @lang('Editar proveedor') </h1>
                    <hr>

                    @include('proveedores._form', ['btnText1' =>'Update', 'btnText2' => 'Cancel'])

                </form>
            </div>
        </div>
    </div>
</x-app-layout>