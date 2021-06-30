<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    protected $table = 'ingresos';

    protected $fillable = [
        'fecha',
        'cantidad',
        'cuenta',
        'Propietario',
        
    ];

    public function cuenta(){
        return $this->belongsTo(cuentasBancarias::class);
    }

    public function ingresos(){
        return $this->hasMany(User::class);
    }
}


