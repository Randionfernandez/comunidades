    <table class="table table-bordered">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Propietario</th>
            <th>Acciones</th>
        </tr>
        @foreach ($propiedades as $propiedad)
        <tr>
            <td>{{ $propiedad->id }}</td>
            <td>{{ $propiedad->nombre }}</td>
            <td>{{ $propiedad->propietario }}</td>
            <td>
                <form action="{{ route('propiedades.destroy',$propiedad->id) }}" method="POST">
    
                    <a class="btn btn-primary" href="{{ route('propiedades.edit',$propiedad->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <div class="pull-right">
        <a class="btn btn-success" href="{{ route('propiedades.create') }}">Crear propiedad</a>
    </div>

