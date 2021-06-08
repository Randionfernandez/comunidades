<x-app-layout>

    <x-slot name="header">
        <h1 class="text-center">@lang('Distribucion de gastos')</h1>
    </x-slot>

    <div class="position-relative">
        <form action="{{ url('distribucion/create') }}">
            @csrf
            <button class="btn btn-primary mx-5 mb-4">@lang('Crear')</button>
        </form>
        @if (session ('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}
        </div>
        @endif
        @if($distribucion->count())
        <table class="table col-md-11 mx-5">
            <thead>
                <tr class="text-white bg-dark">
                    <th scope="col">Nombre</th>
                    <th scope="col">Abreviatura</th>
                    <th scope="col">orden</th>
                    <th scope="col">Lista de propietarios</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($distribucion as $distribucio)
                <tr>
                    <td>{{$distribucio->nombre}}</td>
                    <td>{{$distribucio->abreviatura}}</td>
                    <td>{{$distribucio->orden}}</td>
                    <td>
                        <a href="{{route('distribucion.show',$distribucio->nombre)}}"  type="submit" name='lista' value="{{$distribucio->nombre}}" class="btn btn-info">Propiedades</a> 
                    </td>
                    <td>
                        <a href="{{route('distribucion.edit',$distribucio->nombre)}}"  class="btn btn-dark btn-sm">Editar</a>
                        <form action="{{route('distribucion.destroy',$distribucio->nombre)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                        </form>
                    </td>
                </tr>
                @empty
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay Registros'])
                @endforelse
                @else
                @include('partials.alert-notcreatedyet', ['emptyText1' => 'No hay Registros'])
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>