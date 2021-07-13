<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ComunidadAutonoma extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'comunidades_autonomas';
    protected $fillable = [
        'pais',
        'nombre'
    ];
    
    public function pais () {
        return $this->belongsTo(ComunidadAutonoma::class, 'id', 'pais');
    }
    
}
