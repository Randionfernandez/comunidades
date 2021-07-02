<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;

class DistribucionGasto extends Model
{
    use HasFactory;
    //use SoftDeletes;
    
    protected $table = 'distribuciones_gastos';


    protected $fillable = [
        //'propietario',
        'propiedad_id',
        'coeficiente',
        'unidadRegistral',
        'nombre',
        'abreviatura',
        'orden'
    ];



    public function propietarios(){
        return $this-> hasMany(Propiedad::class);
    }

    public function lista(){
        return $this -> hasMany(ListaDistribucion::class);

    }

    public function movimientos(){
        return $this -> belongsTo(Movimiento::class);
    }
    
}