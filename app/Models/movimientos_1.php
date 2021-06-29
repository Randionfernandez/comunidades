<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class movimientos extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'movimientos';

    protected $fillable = [
        'fechaAlta',
        'cuenta',
        //'distribucion',
        'grupo',
        'fechaValor',
        'concepto',
        'cantidad',
        'iva',
        'observaciones',
        'propiedad'
    ];

    public function cuenta(){
        return $this -> belongsTo(cuentasBancarias::class);
    }

     public function distribucion(){
        return $this -> hasOne(distribucion_gastos::class);
    }

    public function propiedades(){
        return $this -> hasMany(Propiedades_User::class);
    }

}
