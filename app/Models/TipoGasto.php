<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoGasto extends Model
{
    use HasFactory;
    
    protected $table = 'tipos_gastos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombre'
    ];
    
    public function proveedores() {
        return $this->hasMany(Proveedor::class, 'nombre', 'id')->withTimestamps();
    }
}
