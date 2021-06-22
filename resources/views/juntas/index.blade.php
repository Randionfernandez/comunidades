<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Juntas')
        </h2>
        <hr>
    </x-slot>

    @include('partials.session-status')

    <x-jet-button onclick="location.href ='{{ route('juntas.create') }}'">@lang('New')</x-jet-button>
    @if ($juntas->count() > 0)
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th>@lang('Denom')</th>
                        <th>@lang('Tipo')</th>
                        <th>@lang('Solicitante')</th>
                        <th>@lang('Comunidad')</th>
                        <th>@lang('Fecha 1ra')</th>
                        <th>@lang('Hora 1ra')</th>
                        <th class="col-span-2 text-center">@lang('actions')</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($juntas as $junta)
                    <tr>
                        <td>{{$junta->denom_convocatoria}}</td>
                        <td>{{$junta->tipo}}</td>
                        <td>{{$junta->user_id}}</td>
                        <td>{{$junta->comunidad_id}}</td>
                        <td>{{$junta->fecha_primera}}</td>
                        <td>{{$junta->hora_primera}}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('juntas.edit', $junta) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button onclick="location.href ='{{ route('juntas.show', $junta) }}'">{{__('Show')}}</x-jet-danger-button>
                        </td>
                    </tr>
                    @empty
                        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not juntas created yet'])
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not juntas created yet'])
    @endif
</x-app-layout>