<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Editar Distribucion')
        </h2>
        <hr>
    </x-slot>

    <form action="{{route('distribuciones.update',$propietarios[0]['nombre'])}}" method="post">
        @csrf
        @method('PUT')
        @include('distribuciones._form')
    </form>
</x-app-layout>


