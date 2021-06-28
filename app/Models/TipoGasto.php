<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class TipoGasto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'tipos_gastos';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombreTipoGasto'
    ];
    
    public function proveedores() {
        return $this->hasMany(Proveedor::class, 'nombreTipoGasto', 'id')->withTimestamps();
    }
}
