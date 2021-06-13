<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedades_User extends Model
{
    use HasFactory;

    protected $table = 'propiedades_users';

    protected $fillable = [
        'nombre',
        'propiedad'
    ];

    public function distribucion(){
        return $this->belongsTo(distribucion_gastos::class);
    }

    public function movimiento(){
        return $this -> belongsTo(movimientos::class);
    }
}
