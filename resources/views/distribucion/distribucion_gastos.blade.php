@extends('layauts/plantilla')

@section('title','Distrubucion de gastos')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
@endsection

@section('content')
<h1 class="text-center m-40">Lista distribucion de gastos</h1>

<div class="position-relative">

    <form action="{{ url('distribucion/create') }}">
        @csrf 

        <button class="btn btn-primary mx-5 mb-4">Crear</button>

        @if (session ('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{ session('mensaje') }}

        </div>
        @endif

        <div class="card">
            <div class="card-body"> 
                <table class="table table-hover dt-responsive nowrap " id="distribucion">
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
                        @if($distribucion->count())
                        @foreach($distribucion as $distribucio)
                        <tr>
                            <td>{{$distribucio->nombre}}</td>
                            <td>{{$distribucio->abreviatura}}</td>
                            <td>{{$distribucio->orden}}</td>
                            <td>
                                <form>
                                    <a href="{{route('distribucion.show',$distribucio->nombre)}}"  type="submit" name='lista' value="{{$distribucio->nombre}}" class="btn btn-info">Propiedades</a> 
                                </form>
                            </td>

                            <td class="flex">
                                <x-jet-button class="mx-2" onclick="location.href ='{{route('distribucion.edit',$distribucio->nombre)}}'">{{ __('Edit') }}</x-jet-button>
                                <x-jet-danger-button type="submit" href="#" onclick="document.getElementById('delete-distribucion').submit()">{{__('Delete')}}</x-jet-danger-button>
                                <form class="d-none" id="delete-distribucion" action="{{route('distribucion.destroy', $distribucio->nombre)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                        <td>No hay Registros</td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        @endsection


        @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

        <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.1.8/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap.min.js"></script>
        <script>
                                    $('#distribucion').DataTable({
                                        resposive: true,
                                        autoWidth: false,
                                        "language": {
                                            "lengthMenu": "Mostrar _MENU_ registros por pagina",
                                            "zeroRecords": "Nada encontrado  - disculpa",
                                            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                                            "infoEmpty": "No records available",
                                            "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                            "search": 'Buscar:',
                                            "paginate": {
                                                "next": "Siguiente",
                                                "previous": "Anterior"
                                            }

                                        }
                                    });
        </script>
        @endsection    