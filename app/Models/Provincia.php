<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provincia extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'provincias';
    protected $fillable = [
        'comunidadAutonoma_id',
        'nombreProvincia'
    ];
    
    public function comunidadautonoma() {
        return $this->belongsTo(ComunidadAutonoma::class, 'id', 'comunidadAutonoma_id');
    }
    
    public function pais() {
        return $this->hasOneThrough(Pais::class, ComunidadAutonoma::class);
    }
     
}
