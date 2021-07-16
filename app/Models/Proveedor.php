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
        'tipoGasto',
        'codigopais',
        'cp',
        'pais',
        'provincia',
        'localidad'
    ];

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidades_proveedores', 'proveedor_id', 'comunidad_id')->withTimestamps();
    }
    
    public function tipoGasto() {
        return $this->belongsTo(TipoGasto::class, 'id', 'tipoGasto');
    }
    public function nombreTipoGasto($id){
        // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombreTipo = Proveedor::join('tipos_gastos', 'proveedores.tipoGasto', '=', 'tipos_gastos.id')->where('proveedores.id', '=', $id)->get()->pluck('nombreTipo')->last();
    }
}