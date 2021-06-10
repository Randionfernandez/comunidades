@extends('layauts/plantilla')

@section('title','Listado de cuentas bancarias')

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.8/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap.min.css">
@endsection

@section('content')
<h1 class="text-center">Listado de cuentas bancarias</h1>

<a href="{{ route('cuentasBancarias.create') }}" class="btn btn-primary  mx-5 mb-4">Nuevo</a>

@if (session ('mensaje'))
<div class="alert alert-success  alert-dismissible fade show" role="alert">
  {{ session('mensaje') }}
  
</div>
@endif
    <div class="card">
        <div class="card-body">


    <table class="table  table-hover dt-responsive nowrap" id="cuentasBancarias">
        <thead>
            <tr class="text-white bg-dark">
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Pais</th>
                <th scope="col">DC</th>
                <th scope="col">Cuenta</th>
                <th scope="col">Bic</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>

        <tbody>
        @if($cuentasBancarias->count())
            @foreach($cuentasBancarias as $cuentaBancaria)
            <tr>
                <td>{{ $cuentaBancaria-> id }}</td>
                <td>{{ $cuentaBancaria-> nombre }}</td>
                <td>{{ $cuentaBancaria-> pais }}</td>
                <td>{{ $cuentaBancaria-> dc }}</td>
                <td>{{ $cuentaBancaria-> cuenta }}</td>
                <td>{{ $cuentaBancaria-> bic }}</td>
                <td>
                    
                    <a href="{{route('cuentasBancarias.edit',$cuentaBancaria->id)}}" class="btn btn-dark btn-sm">Editar</a>
                    
                    <form action="{{route('cuentasBancarias.destroy',$cuentaBancaria->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger btn-sm" value="Eliminar">
                    </form>
                    
                </td>
            </tr>
            @endforeach
        @else
        <tr>
                <td>No hay cuentas bancarias</td>
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
            $('#cuentasBancarias').DataTable({
                resposive:true,
                autoWidth: false,
                "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "Nada encontrado  - disculpa",
                "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search":'Buscar:',
                "paginate": {
                    "next" : "Siguiente",
                    "previous": "Anterior"
                }

        }
            });
    </script>
 @endsection    