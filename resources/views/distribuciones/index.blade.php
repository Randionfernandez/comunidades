<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Lista distribucion de gastos')
        </h2>
        <hr>
    </x-slot>

    <div class="position-relative">

        <x-jet-button onclick="location.href ='{{ route('distribuciones.create') }}'">@lang('New')</x-jet-button>

        @include('partials.session-status')

        @if($distribucion->count())

        <div class="card">
            <div class="card-body"> 
                <table class="table table-hover dt-responsive nowrap " id="buscador">
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

                        @foreach($distribucion as $distribucio)
                        <tr>
                            <td>{{$distribucio->nombre}}</td>
                            <td>{{$distribucio->abreviatura}}</td>
                            <td>{{$distribucio->orden}}</td>
                            <td>
                                <form>
                                    <a href="{{route('distribuciones.show',$distribucio->nombre)}}"  type="submit" name='lista' value="{{$distribucio->nombre}}" class="btn btn-info">Propiedades</a> 
                                </form>
                            </td>
                            @if ($distribucio->nombre != 'unidadRegistral')
                            <td class="flex">
                    <x-jet-button class="mx-2" onclick="location.href ='{{route('distribuciones.edit',$distribucio->nombre)}}'">{{ __('Edit') }}</x-jet-button>
                    <x-jet-danger-button type="submit" href="#" onclick="document.getElementById('delete-distribucion').submit()">{{__('Delete')}}</x-jet-danger-button>
                    <form class="d-none" id="delete-distribucion" action="{{route('distribuciones.destroy', $distribucio)}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    </td>
                    @else
                    <td></td>
                    @endif
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        @else
        <tr>
            @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not distributions created yet'])
        </tr>
        @endif
    </div>

</x-app-layout> 