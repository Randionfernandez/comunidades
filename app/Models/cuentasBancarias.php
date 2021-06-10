<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class cuentasBancarias extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function movimiento(){
        return $this->hasMany(ingresos::class);
    }

}
