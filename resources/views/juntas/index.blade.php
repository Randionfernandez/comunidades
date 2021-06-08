<x-app-layout>

    @csrf

    @include('partials.session-status')
    
    <div class="inline-flex">
        <x-jet-button class="mx-2 {{$btndisabled}}">{{ __($btnText1) }}</x-jet-button>
        <x-jet-danger-button  onclick="location.href ='{{ route('dashboard') }}'"> {{ __($btnText2) }}</x-jet-danger-button>
    </div>
    
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'En proceso de creacion.'])

    <x-jet-validation-errors></x-jet-validation-errors>
    
</x-app-layout>