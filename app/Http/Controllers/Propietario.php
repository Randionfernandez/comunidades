<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Propietario extends Model
{
    use HasFactory;
    
    protected $table = "propietarios";

    protected $fillable = [
        "Tratamiento",
        "Nombre",
        "Apellido1",
        "Apellido2",
        "Tipo",
        "Fecha",
        "DNI",
        "Email",
        "Telefono",
        "Calle",
        "Portal",
        "Bloque",
        "Escalera",
        "Piso",
        "Puerta",
        "Codigo_pais",
        "CP",
        "Pais",
        "Provincia",
        "Localidad"
    ];

    public function ingreso(){
        return $this->BelongsTo(ingresos::class);
    }


}

