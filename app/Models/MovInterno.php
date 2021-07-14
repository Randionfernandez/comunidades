<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Movimiento interno
 * 
 * Representa un movimiento de dinero entre cuentas internas de la misma comunidad,
 * por tanto, no puede consierarse ni gasto ni ingreso.
 * Por ejemplo:
 * - se cierra una cuenta y el saldo se traslada a la nueva cuenta.
 * - el administrador retira dinero de una cuenta bancaria de la comunidad para 
 * ingresarlo  en la cuenta de administración (si la hubiewse) con el fin de hacer pagos en efectivo.
 */
class MovInterno extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    
    protected $fillable=[
        'emisora',
        'receptora',
    ];
}