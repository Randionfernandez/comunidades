<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    use HasFactory;

    protected $table = 'paises';
    protected $keyType = 'string';
    protected $primaryKey = 'codigoISO3';
    public $timestamps = false;
    protected $fillable = [
        'codigoISO3',
        'codigoISO2',
        'cod_numerico',
        'nombre',
    ];

    public function comunidades() {
        return $this->hasMany(Comunidad::class, 'paises', 'id');
    }

    public function cuentasBancarias() {
        return $this->hasMany(CuentaBancaria::class, 'paises', 'id');
    }

    public function comunidadesAutonomas() {
        return $this->hasMany(ComunidadAutonoma::class, 'paises', 'id');
    }

}
