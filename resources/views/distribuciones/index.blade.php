<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            @lang('Lista distribucion de gastos')
        </h2>
        <hr>
    </x-slot>

    <div class="position-relative">
        
        @if ($propiedades->count())
            <x-jet-button onclick="location.href ='{{ route('distribuciones.create') }}'">@lang('New')</x-jet-button>
        @else
            @include('partials.alert-notcreatedyet', ['emptyText1' => 'There are not Properties created yet'])
        @endif

        @include('partials.session-status')

        @if($distribuciones->count())

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

                        @forelse($distribuciones as $distribucion)
                        <tr>
                            <td>{{$distribucion->name}}</td>
                            <td>{{$distribucion->abreviatura}}</td>
                            <td>{{$distribucion->orden}}</td>
                            <td>
                                <form>
                                    <a href="{{route('distribuciones.show',$distribucion->name)}}"  type="submit" name='lista' value="{{$distribucion->name}}" class="btn btn-info">Propiedades</a> 
                                </form>
                            </td>
                            @if ($distribucion->name != 'unidadRegistral')
                                <td class="flex">
                                    <x-jet-button class="mx-2" onclick="location.href ='{{route('distribuciones.edit',$distribucion)}}'">{{ __('Edit') }}</x-jet-button>
                                    <x-jet-danger-button type="submit" href="#" onclick="document.getElementById('delete-distribucion').submit()">{{__('Delete')}}</x-jet-danger-button>
                                    <form class="d-none" id="delete-distribucion" action="{{route('distribuciones.destroy', $distribucion)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                                @else
                                <td></td>
                            @endif
                        </tr>
                        @empty
                        <p>Vacio</p>
                        @endforelse
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