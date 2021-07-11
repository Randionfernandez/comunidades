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
        "denominacion",
        "user_id",
        "comunidad_id",
        "tipo_id",
        "parte",
        "coeficiente",
        "observaciones"
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class, 'id', 'comunidad_id');
    }
    
    public function nombretipoPropiedad() {
        return $this->belongsTo(TipoPropiedad::class, 'tipo_id', 'nombre')->withTimestamps();
    }
    
    public function propietario() {
        return $this->belongsTo(User::class);
    }
    
    public function nombrePropietario(Propiedad $propiedad){
        return User::join('propiedades', 'users.id', '=', 'propiedades.user_id')->where('propiedades.id', '=', $propiedad->id)->where('propiedades.user_id', '=', $propiedad->user_id)->get()->pluck('name')->last();
    }

}
