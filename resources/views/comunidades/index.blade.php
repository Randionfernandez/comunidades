<x-app-layout>
    
    @include('partials.session-status')

    @if( $user->comunidades->count() < $user->MaxFreeCommunities)
    <x-jet-button onclick="location.href ='{{ route('comunidades.create') }}'">@lang('New')</x-jet-button>
    @endif

    @if ($user->comunidades->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('denom')</th>
                <th>@lang('cif')</th>
                <th>@lang('direccion')</th>
                <th>@lang('Fecha Alta')</th>
                <th>@lang('partes')</th>
                <th>@lang('actions')</th>
            </tr>
        </thead>
        @forelse($user->comunidades as $comunidad )
        <tbody>
            <tr>
                <td>{{$comunidad->denom}}</td>
                <td>{{$comunidad->cif}}</td>
                <td>{{$comunidad->direccion}}</td>
                <td>{{$comunidad->fechalta}}</td>
                <td>{{$comunidad->partes}}</td>
                <td class="flex border-0">
                    @if (! Session::has('activeCommunity'))
                        <x-jet-button class="mx-2" onclick="location.href ='{{ route('comunidades.select', $comunidad) }}'">{{ __('Select') }}</x-jet-button>
                    @endif
                        <x-jet-danger-button onclick="location.href ='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button>
                </td>
        </tr>
        </tbody>
        @empty
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
        @endforelse
    </table>
    
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
    @endif

    {{-- $comunidades->links() --}}
</x-app-layout>