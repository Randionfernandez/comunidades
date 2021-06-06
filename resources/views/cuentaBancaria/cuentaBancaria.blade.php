<x-app-layout>

    <x-slot name="header">
        <h1 class="text-center">Listado de cuentas bancarias</h1>
    </x-slot>

    <a href="{{ url('cuentasBancarias/create') }}" class="btn btn-primary  mx-5 mb-4">Nuevo</a>
    
    
    @if($cuentasBancarias->count())

    <table class="table col-md-11 mx-5">
        <thead>
            <tr class="text-white bg-dark">
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Pais</th>
                <th scope="col">DC</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Bic</th>
            </tr>
        </thead>

        <tbody>
            
            @forelse($cuentasBancarias as $cuentaBancaria)
            <tr>
                <td>{{ $cuentaBancaria-> id }}</td>
                <td>{{ $cuentaBancaria-> nombre }}</td>
                <td>{{ $cuentaBancaria-> pais }}</td>
                <td>{{ $cuentaBancaria-> dc }}</td>
                <td>{{ $cuentaBancaria-> cuenta }}</td>
                <td>{{ $cuentaBancaria-> bic }}</td>
            </tr>
            @empty
            @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay cuentas bancarias'])
            @endforelse
            
        </tbody>
    </table>
    @else
    @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay cuentas bancarias'])
    @endif

</x-app-layout>

