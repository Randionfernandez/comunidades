<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    use HasFactory;
    
    protected $table = 'paises';
    protected $keyType = 'string';
    protected $primaryKey= 'codigoISO';
    public $timestamps = false;
    
    protected $fillable = [
        'codigoISO',
        'codigoANSI',
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