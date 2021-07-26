<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Movimiento extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'n_op',
        'fecha',
        'fecha_valor',
        'importe',
        'saldo',
        'concepto',
        'contabilizado',
    ];

    public function cuenta() {
        return $this->belongsTo(Cuenta::class);
    }

}