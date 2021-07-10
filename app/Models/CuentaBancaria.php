<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    use HasFactory;

    protected $table = 'cuentas_bancarias';

    protected $fillable = [
        'name',
        'pais_id',
        'dc',
        'cuenta',
        'bic'
    ];

    public function ingresos(){
        return $this->hasMany(Ingreso::class);
    }

    public function movimientos(){
        return $this->hasMany(Ingreso::class);
    }
    
    public function paises() {
        return $this->belongsTo(Pais::class, 'id', 'pais_id')->withTimestamps();
    }
    
    public function nombrePais($id){
        return $nombrePais = CuentaBancaria::join('paises', 'cuentas_bancarias.pais_id', '=', 'paises.id')->where('cuentas_bancarias.id', '=', $id)->get()->pluck('nombrePais')->last();
    }
}
