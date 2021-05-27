<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Propiedades</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="mb-3 mt-5">
                    <h2>Propiedades</h2>
                </div>
                
                @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                        {{ $errors }}
                    </div>
                @endif
                
                <form action="{{ route('propiedades.store') }}" method="POST">
                    @csrf
                    <label for="nombre" class="form-label">Nombre</label>
                    <input required type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}"/>
                
                    @error('nombre')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="propietario" class="form-label">Propietario</label>
                    <input required type="text" id="propietario" name="propietario" class="form-control"  value="{{ old('propietario') }}"/>

                    @error('propietario')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="tipo" class="form-label">Tipo de propiedad</label>
                    <select required class="form-select form-select-sm" id="tipo" name="tipo"   value="{{ old('tipo') }}">
                        <option value="local">Local</option>
                        <option value="piso">Piso</option>
                        <option value="atico">Atico</option>
                    </select>
                    
                    @error('tipo')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <label for="coeficiente" class="form-label">Coeficiente</label>
                    <input required type="integer" id="coeficiente" name="coeficiente" class="form-control"  value="{{ old('coeficiente') }}"/>

                    @error('coeficiente')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="parte" class="form-label">Parte</label>
                    <input required type="text" id="parte" name="parte" class="form-control"  value="{{ old('parte') }}"/>

                    @error('parte')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="observacion" class="form-label">Observaciones</label>
                    <input type="text" id="observacion" name="observacion" class="form-control"  value="{{ old('observacion') }}"/>

                    <button type="submit" class="btn btn-primary">Crear Propiedad</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
