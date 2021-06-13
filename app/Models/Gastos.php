<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gastos extends Model
{
    use HasFactory;

    protected $table = 'lista_gastos';

    protected $fillable = [
        'descripcion',
        'proveedor',
        'fecha',
        'importe'
    ];
}
