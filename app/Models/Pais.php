<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model {

    use HasFactory;
<<<<<<< HEAD

=======
<<<<<<< HEAD

=======
>>>>>>> c4e5f520d6fa6d9bc9914a643a82cd2e2fe89654
    
>>>>>>> 480e0a25763c3e796ea0035d616d3a457377a7f7
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