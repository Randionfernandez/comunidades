<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Listado de cuentas bancarias')
        </h2>
        <hr>
    </x-slot>
    
    @include('partials.session-status')

    <x-jet-button onclick="location.href ='{{ route('cuentasBancarias.create') }}'">@lang('New')</x-jet-button>

    @if(count($cuentasBancarias))
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th scope="col">@lang('Banca')</th>
                        <th scope="col">Pais</th>
                        <th scope="col">DC</th>
                        <th scope="col">Cuenta</th>
                        <th scope="col">Bic</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($cuentasBancarias as $cuentaBancaria)
                    <tr>
                        <td>{{ $cuentaBancaria->name }}</td>
                        <td>{{$cuentaBancaria->nombrePais($cuentaBancaria->id)}}</td>
                        <td>{{ $cuentaBancaria->dc }}</td>
                        <td>{{ $cuentaBancaria->cuenta }}</td>
                        <td>{{ $cuentaBancaria->bic }}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('cuentasBancarias.edit', $cuentaBancaria) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button type="submit" onclick="location.href ='{{ route('cuentasBancarias.show', $cuentaBancaria) }}'">@lang('Show')</x-jet-danger-button>
                        </td>
                        <form class="d-none" id="delete-cuenta" action="{{route('cuentasBancarias.destroy', $cuentaBancaria)}}" method="post">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Bank Accounts created yet'])
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Bank Accounts created yet'])
    @endif

</x-app-layout>