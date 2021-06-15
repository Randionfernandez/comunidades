<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Distrubucion')
        </h2>
        <hr>
    </x-slot>


<form action="{{ route('distribucion.store') }}" method="POST">
     @csrf

   @include('distribucion/form')
</form>
</x-app-layout>