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
    
    protected $fillable = [
        "name",
        "user_id",
        "comunidad_id",
        "tipoPropiedad_id",
        "parte",
        "coeficiente",
        "observaciones"
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }
    
    public function nombretipoPropiedad() {
        return $this->belongsTo(TipoPropiedad::class, 'tipoPropiedad_id', 'nombreTipoPropiedad')->withTimestamps();
    }
    
    public function propietario() {
        return $this->belongsTo(User::class);
    }

}
