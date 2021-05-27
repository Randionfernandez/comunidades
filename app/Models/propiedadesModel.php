<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propiedadesModel extends Model
{
    use HasFactory;

    protected $table = "propiedades";

    protected $fillable = [
        "nombre",
        "propietario",
        "tipo",
        "coeficiente",
        "parte",
        "observaciones"
    ];
}
