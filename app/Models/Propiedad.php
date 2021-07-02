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
        "tipoPropiedad",
        "parte",
        "coeficiente",
        "observaciones"
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }
    
    public function nombretipoPropiedad() {
        return $this->belongsTo(TipoPropiedad::class, 'id', 'nombreTipoPropiedad')->withTimestamps();
    }
    
    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'id', 'id');
    }

}
