<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Comunidad::class, 'paises', 'id');
    }
    
    public function cuentasBancarias() {
        return $this->hasMany(Cuenta::class, 'paises', 'id');
    }
    
    public function comunidadesAutonomas() {
        return $this->hasMany(ComunidadAutonoma::class, 'paises', 'id');
    }
}