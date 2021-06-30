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
        'iva',
        'observaciones',
        'propiedad'
    ];

    public function cuenta(){
        return $this -> belongsTo(CuentaBancaria::class);
    }

     public function distribucion(){
        return $this -> hasOne(DistribucionGasto::class);
    }

    public function propiedades(){
        return $this -> hasMany(PropiedadUser::class);
    }

}
