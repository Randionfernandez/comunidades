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
    
    public function comunidad() {
        return $this->belongsTo(Comunidad::class, 'comunidad_id', 'id');
    }
    
    public function nombreSolicitante(int $user_id){
        return User::join('juntas', 'users.id', '=', 'juntas.user_id')->where('juntas.user_id', '=', $user_id)->where('juntas.user_id', '=', auth()->user()->id)->get()->pluck('name')->last();
    }
    
    public function nombreComunidad(int $comunidad_id){
        return Comunidad::join('juntas', 'comunidades.id', '=', 'juntas.comunidad_id')->where('juntas.comunidad_id', '=', $comunidad_id)->where('juntas.user_id', '=', auth()->user()->id)->get()->pluck('denom')->last();
    }

}
