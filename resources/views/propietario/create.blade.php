<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Propietarios</title>
    
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <div class="mb-3 mt-5">
                    <h2>Propietarios</h2>
                </div>
               
                @if ($errors->any())
                    <div class="alert alert-warning" role="alert">
                        {{ $errors }}
                    </div>
                @endif
                
                <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('propietario.store') }}">
                @csrf
                  
                    <label for="Tratamiento" class="form-label">"Tratamiento"</label>
                    <select  required class="form-select form-select-sm" id="Tratamiento" name="Tratamiento">
                        <option value="Sr" {{ old("Tratamiento") == "Sr" ? "selected" : "" }}>"Sr"</option>
                        <option value="Sra" {{ old("Tratamiento") == "Sra" ? "selected" : "" }}>"Sra"</option>                       
                    </select>

                    <label for="Nombre" class="form-label">"Nombre"</label>
                    <input required type="text" id="Nombre" name="Nombre" class="form-control" value="{{ old('Nombre') }}"/>
                    @error('Nombre')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="Apellido1" class="form-label">"Apellido1"</label>
                    <input required type="text" id="Apellido1" name="Apellido1" class="form-control" value="{{ old('Apellido1') }}"/>
                    @error('Apellido1')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="Apellido2" class="form-label">"Apellido2"</label>
                    <input required type="text" id="Apellido2" name="Apellido2" class="form-control" value="{{ old('Apellido2') }}"/>
                    @error('Apellido2')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                     <label for="Tipo" class="form-label">"Tipo"</label>
                    <select  required class="form-select form-select-sm" id="Tipo" name="Tipo">
                        <option value="Fisica" {{ old("Tipo") == "Fisica" ? "selected" : "" }}>{{ ("Fisica") }}</option>
                        <option value="Juridica" {{ old("Tipo") == "Juridica" ? "selected" : "" }}>{{ ("Juridica") }}</option>                       
                    </select>

                    
                    <label for="Fecha" class="form-label">"Fecha"</label>
                    <input requied type="date" id="Fecha" name="Fecha" value="{{ old('fecha') }}" class="form-control" />

                    
                    <label for="DNI" class="form-label">"DNI"</label>
                    <input requied type="text" id="DNI" name="DNI" class="form-control" value="{{ old('DNI') }}"/>
                    @error('DNI')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="Email" class="form-label">"Email"</label>
                    <input requied type="email" id="Email" name="Email" class="form-control" value="{{ old('Email') }}"/>
                    @error('Email')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="Telefono" class="form-label">"Telefono"</label>
                    <input required type="text" id="Telefono" name="Telefono" class="form-control" value="{{ old('Telefono') }}"/>
                    @error('Telefono')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <h3>Dirección para notificaciones</h3>
                    
                    <label for="Calle" class="form-label">"Calle"</label>
                    <input required type="text" id="Calle" name="Calle" class="form-control" value="{{ old('Calle') }}"/>
                    @error('Calle')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                
                     <label for="Portal" class="form-label">"Portal"</label>
                    <input required type="text" id="Portal" name="Portal" class="form-control" value="{{ old('Portal') }}"/>
                    @error('Portal')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="Bloque" class="form-label">{{ ("Bloque") }}</label>
                    <input required type="text" id="Bloque" name="Bloque" class="form-control" value="{{ old('Bloque') }}"/>
                    @error('Bloque')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                   <label for="Escalera" class="form-label">"Escalera"</label>
                    <input required type="text" id="Escalera" name="Escalera" class="form-control" value="{{ old('Escalera') }}"/>
                    @error('Escalera')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                      <label for="Piso" class="form-label">"Piso"</label>
                    <input required type="text" id="Piso" name="Piso" class="form-control" value="{{ old('Piso') }}"/>
                    @error('Piso')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                     <label for="Puerta" class="form-label">"Puerta"</label>
                    <input required type="text" id="Puerta" name="Puerta" class="form-control" value="{{ old('Puerta') }}"/>
                    @error('Puerta')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="codigopais" class="form-label">@lang("Codigo pais")</label>
                    <input required type="text" id="codigopais" name="codigopais" class="form-control" value="{{ old('codigopais') }}"/>
                    @error('codigopais')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    
                    <label for="CP" class="form-label">"CP"</label>
                    <input required type="text" id="CP" name="CP" class="form-control" value="{{ old('CP') }}"/>
                    @error('CP')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="Pais" class="form-label">"Pais"</label>
                    <input required type="text" id="Pais" name="Pais" class="form-control" value="{{ old('Pais') }}"/>
                    @error('Pais')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="Provincia" class="form-label">"Provincia"</label>
                    <input required type="text" id="Provincia" name="Provincia" class="form-control" value="{{ old('Provincia') }}"/>
                    @error('Provincia')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                
                    <label for="Localidad" class="form-label">"Localidad"</label>
                    <input required type="text" id="Localidad" name="Localidad" class="form-control" value="{{ old('Localidad') }}"/>
                     @error('Localidad')
                        <div class="alert alert-danger mb-2" role="alert">
                            {{ $message }}
                        </div>
                    @enderror

                    <button type="submit" class="btn btn-secondary">"Enviar"</button>
                </form>
                
                
                
            </div>
            <div class="col-4"></div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>