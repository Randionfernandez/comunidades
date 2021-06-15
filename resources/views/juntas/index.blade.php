<x-app-layout>

    @include('partials.session-status')

    <x-jet-button onclick="location.href ='{{ route('juntas.create') }}'">@lang('New')</x-jet-button>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>@lang('Denom')</th>
                <th>@lang('Tipo')</th>
                <th>@lang('Solicitante')</th>
                <th>@lang('Comunidad')</th>
                <th>@lang('Fecha 1ra')</th>
                <th>@lang('Hora 1ra')</th>
                <th>@lang('actions')</th>
            </tr>
        </thead>
        @forelse($juntas as $junta)
        <tbody>
            <tr>
                <td>{{$junta->denom_convocatoria}}</td>
                <td>{{$junta->tipo}}</td>
                <td>{{$junta->user_id}}</td>
                <td>{{$junta->comunidad_id}}</td>
                <td>{{$junta->fecha_primera}}</td>
                <td>{{$junta->hora_primera}}</td>
                <td class="flex border-0">
        <x-jet-button class="mx-2" onclick="location.href ='{{ route('juntas.edit', $junta) }}'">{{ __('Edit') }}</x-jet-button>
        <x-jet-danger-button onclick="location.href ='{{ route('juntas.show', $junta) }}'">{{__('Show')}}</x-jet-danger-button>
        </td>
        </tr>
        </tbody>
        @empty
        @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not juntas created yet'])
        @endforelse
    </table>

</x-app-layout>