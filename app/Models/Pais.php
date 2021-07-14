<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use HasFactory;

    
    protected $table = 'paises';
    protected $fillable = [
        'nombre',
        'codigoISO',
        'codigoANSI',
    ];
    
    public function comunidades() {
        return $this->hasMany(Comunidad::class, 'pais', 'id')->withTimestamps();
    }
    
    public function cuentasBancarias() {
        return $this->hasMany(CuentaBancaria::class, 'pais', 'id')->withTimestamps();
    }
    
    public function comunidadesAutonomas() {
        return $this->hasMany(ComunidadAutonoma::class, 'pais', 'id')->withTimestamps();
    }
}
