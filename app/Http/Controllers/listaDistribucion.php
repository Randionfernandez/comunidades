<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listaDistribucion extends Model
{
    use HasFactory;

    protected $table = 'lista_distribucions';

    public function distribucion(){
        return $this -> belongsTo(distribucion_gastos::class);
    }
}


