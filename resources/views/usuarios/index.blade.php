<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Users')
        </h2>
        <hr>
    </x-slot>

    @if($activeCommunity->nombreRole($activeCommunity) == 'admin')

    <x-jet-button onclick="location.href ='{{ route('usuarios.create') }}'">@lang('New')</x-jet-button>

        @include('partials.session-status')

        @if ($users->count())
        <div class="card">
            <div class="card-body">
                <table class="table table-hover dt-responsive nowrap" id="buscador">
                    <thead>
                        <tr class="text-white bg-dark">
                            <th>@lang('Nombre')</th>
                            <th>@lang('Email')</th>
                            <th class="col-span-2 text-center">@lang('Actions')</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="flex">
                                <x-jet-button class="mx-2" onclick="location.href ='{{ route('usuarios.edit', $user) }}'">{{ __('Edit') }}</x-jet-button>
                                <x-jet-danger-button onclick="location.href ='{{ route('usuarios.show', $user) }}'">{{__('Show')}}</x-jet-danger-button>
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
    @endif

</x-app-layout>
