<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('propiedades.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <form action="{{ route('propiedades.update',$propiedad->id) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre de la propiedad:</strong>
                    <input type="text" name="nombre" value="{{ $propiedad->nombre }}" class="form-control" placeholder="Name">
                </div>
                <div class="form-group">
                    <strong>Propietario:</strong>
                    <input type="text" name="propietario" value="{{ $propiedad->propietario }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
