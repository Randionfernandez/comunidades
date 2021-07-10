<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'paises';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'nombrePais',
        'abreviaturaPais',
        'codigoANSIPais'
    ];
    
    public function comunidades() {
        return $this->hasMany(Comunidad::class, 'pais_id', 'id')->withTimestamps();
    }
    
    public function cuentasBancarias() {
        return $this->hasMany(CuentaBancaria::class, 'pais_id', 'id')->withTimestamps();
    }
    
    public function comunidadesAutonomas() {
        return $this->hasMany(ComunidadAutonoma::class, 'pais_id', 'id')->withTimestamps();
    }
}
