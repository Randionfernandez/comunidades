@extends('adminlte.layout')
    @section('header')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{__($title)}}
        </h2>
        <hr>
    @endsection
    
    @section('content')
    
    @include('partials.session-status')

    <x-jet-button onclick="location.href ='{{ route('cuentas.create') }}'">@lang('New')</x-jet-button>

    @if(count($cuentas))
    <div class="card">
        <div class="card-body">
            <table class="table table-hover dt-responsive nowrap" id="buscador">
                <thead>
                    <tr class="text-white bg-dark">
                        <th scope="col">@lang('Banca')</th>
                        <th scope="col">@lang('Cuenta')</th>
                        <th scope="col">@lang('Bic')</th>
                        <th scope="col">@lang('Saldo')</th>
                        <th class="col-span-2 text-center">@lang('Actions')</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->siglas }}</td>
                        <td>{{ $cuenta->iban }}</td>
                        <td>{{ $cuenta->bic }}</td>
                        <td>{{ $cuenta->saldo }}</td>
                        <td class="flex">
                            <x-jet-button class="mx-2" onclick="location.href ='{{ route('cuentas.edit', $cuenta) }}'">{{ __('Edit') }}</x-jet-button>
                            <x-jet-danger-button type="submit" onclick="location.href ='{{ route('cuentas.show', $cuenta) }}'">@lang('Show')</x-jet-danger-button>
                        </td>
                        <form class="d-none" id="delete-cuenta" action="{{route('cuentas.destroy', $cuenta)}}" method="post">
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

@endsection