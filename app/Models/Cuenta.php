<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Cuenta extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'iban',
        'siglas',
        'denominacion',
        'fecha_apertura',
        'activa',
        'saldo',
        'bic',
        'divisa',
        'comentarios',
        'comunidad_id'
    ];

    public function comunidad() {
        return $this->belongsTo(Comunidad::class);
    }

    public function movimientos() {
        return $this->hasMany(Movimiento::class);
    }

}