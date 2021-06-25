<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pais;
use Illuminate\Support\Facades\DB;

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
    
    public function paises() {
        return $this->belongsTo(Pais::class, 'id', 'pais')->withTimestamps();
    }
    
    public function nombrePais($id){
        return $nombrePais = CuentasBancarias::join('paises', 'cuentas_bancarias.pais', '=', 'paises.id')->where('cuentas_bancarias.id', '=', $id)->get()->pluck('nombrePais')->last();
    }
}
