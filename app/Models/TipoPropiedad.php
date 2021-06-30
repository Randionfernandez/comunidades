<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    use HasFactory;
    
    protected $table = 'tipos_propiedades';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'abreviaturaTipoPropiedad',
        'nombreTipoPropiedad'
    ];
    
    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'nombreTipoPropiedad', 'id')->withTimestamps();
    }
}
