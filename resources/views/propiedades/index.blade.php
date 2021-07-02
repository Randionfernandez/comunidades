<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Propiedades')
        </h2>
        <hr>
    </x-slot>

    @include('partials.session-status')
    
    <x-jet-button onclick="location.href ='{{ route('propiedades.create') }}'">@lang('New')</x-jet-button>

    @if( $propiedades->count() <= 0)

    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('Name')</th>
                        <th>@lang('Owner')</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($propiedades as $propiedad )
                    <tr>
                        <td>{{$propiedad->name}}</td>
                        <td>{{$comunidad->user_id}}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('propiedades.edit', $propiedad->id) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button onclick="location.href ='{{ route('propiedades.show', $propiedad) }}'">{{__('Show')}}</x-jet-danger-button>
                        </td>
                    </tr>
                    @empty
                    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not properties created yet'])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not properties created yet'])
    @endif
    
</x-app-layout>