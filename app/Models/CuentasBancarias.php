<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuentasBancarias extends Model
{
    use HasFactory;

    protected $table = 'cuentas_bancarias';

    protected $fillable = [
        'nombre',
        'pais',
        'dc',
        'cuenta',
        'bic'
    ];

    public function ingresos(){
        return $this->hasMany(ingresos::class);
    }

    public function movimientos(){
        return $this->hasMany(ingresos::class);
    }
}
