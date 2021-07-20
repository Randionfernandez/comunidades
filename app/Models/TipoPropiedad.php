<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPropiedad extends Model
{
    use HasFactory;
    
    protected $table = 'tipos_propiedad';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'abreviatura',
        'nombre'
    ];
    
    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'nombre', 'id')->withTimestamps();
    }
}
