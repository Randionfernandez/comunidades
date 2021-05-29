<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Propiedad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = "propiedades";
    protected $dates = ['deleted_at'];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }
    
    protected $fillable = [
        "nombre",
        "propietario",
        "tipo",
        "coeficiente",
        "parte",
        "observaciones"
    ];

}
