<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Comunidades')
        </h2>
        <hr>
    </x-slot>

    @if(! session()->get('activeCommunity'))
    @php $comunidades = $user->comunidades @endphp
    @else
    @php $comunidades = [session()->get('activeCommunity')] @endphp
    @endif

    @include('partials.session-status')

    @if( $user->comunidades->count() < $user->MaxFreeCommunities)
    <x-jet-button onclick="location.href ='{{ route('comunidades.create') }}'">@lang('New')</x-jet-button>
    @endif

    @if ($user->comunidades->count() > 0)
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('denom')</th>
                        <th>@lang('cif')</th>
                        <th>@lang('direccion')</th>
                        <th>@lang('Fecha Alta')</th>
                        <th>@lang('partes')</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>
                
                <tbody>
                    @forelse($comunidades as $comunidad )
                    <tr>
                        <td>{{$comunidad->denom}}</td>
                        <td>{{$comunidad->cif}}</td>
                        <td>{{$comunidad->direccion}}</td>
                        <td>{{$comunidad->fechalta}}</td>
                        <td>{{$comunidad->partes}}</td>
                        <td class="flex">
                            @if (! Session::has('activeCommunity'))
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('comunidades.select', $comunidad) }}'">{{ __('Select') }}</x-jet-button>
                            @endif
                            <x-jet-danger-button onclick="location.href ='{{ route('comunidades.show', $comunidad) }}'">{{__('Show')}}</x-jet-danger-button>
                        </td>
                    </tr>
                    @empty
                    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not communities created yet'])
    @endif
    
</x-app-layout>