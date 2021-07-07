<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Junta extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'juntas';
    
    protected $fillable = [
        'denom_convocatoria',
        'tipo',
        'user_id',
        'comunidad_id',
        'fecha_primera',
        'hora_primera',
        'fecha_segunda',
        'hora_segunda',
        'orden_dia'
    ];
    
    public function comunidad () {
        return $this->belongsTo(Comunidad::class, 'id', 'comunidad_id');
    }

}
