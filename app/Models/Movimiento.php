<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    protected $fillable = [
        'fechaAlta',
        'cuenta',
        'distribucion',
        'grupo',
        'fechaValor',
        'concepto',
        'cantidad',
        'observaciones',
        'propiedad_id'
    ];

    public function cuenta(){
        return $this -> belongsTo(CuentaBancaria::class);
    }

     public function distribucion(){
        return $this -> hasOne(DistribucionGasto::class);
    }

    public function propiedad(){
        return $this -> belongsTo(Propiedad::class, 'propiedad_id', 'id');
    }
    
    public function nombrePropiedad($id) {
        $nombrePropiedad = Movimiento::join('propiedades', 'movimientos.propiedad_id', '=', 'propiedades.id')->where('propiedades.id', '=', $id)->get()->pluck('name')->last();
        return $nombrePropiedad;
    }

}
