<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'proveedores';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'fechalta',
        'cif',
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'telefono',
        'calle',
        'tipo',
        'calificacion',
        'figura',
        'portal',
        'bloque',
        'escalera',
        'piso',
        'puerta',
        'codigopais',
        'cp',
        'pais',
        'provincia',
        'localidad',
        'iban'
    ];

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidades_proveedores', 'proveedor_id', 'comunidad_id')->withTimestamps();
    }
    
    public function tipos() {
        return $this->belongsTo(Tipo::class, 'id', 'tipo')->withTimestamps();
    }
    
    public function calificaciones() {
        return $this->belongsTo(Calificacion::class, 'id', 'calificacion')->withTimestamps();
    }
    
    public function figuras() {
        return $this->belongsTo(Figura::class, 'id', 'figura')->withTimestamps();
    }

     public function nombreTipo($id){
        // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombreTipo = Proveedor::join('tipos', 'proveedores.tipo', '=', 'tipos.id')->where('proveedores.id', '=', $id)->get()->pluck('nombreTipo')->last();
    }

     public function nombreCalificacion($id){
        return $nombreCalificacion = Proveedor::join('calificaciones', 'proveedores.calificacion', '=', 'calificaciones.id')->where('proveedores.id', '=', $id)->get()->pluck('nombreCalificacion')->last();
    }
}