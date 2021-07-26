<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {

    use HasFactory;
    //use SoftDeletes;

    protected $table = 'proveedores';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'fechalta',
        'doi', // documento oficial de identidad: pasaporte, dni, cif, nie
        'persona', // física o jurídica
        'nombre',
        'apellidos', // null si la persona es jurídica
        'email',
        'telefono1',
        'telefono2',
        'dir_postal',
        'cp',
        'actividad',
        'pais',
        'localidad',
        'iban',
        'comentario'
    ];

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidad_proveedor', 'proveedor_id', 'comunidad_id')->withTimestamps();
    }

    public function tipoGasto() {
        return $this->belongsTo(TipoGasto::class, 'id', 'tipoGasto');
    }

    public function nombreTipoGasto($id) {
        // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombreTipo = Proveedor::join('tipos_gastos', 'proveedores.tipoGasto', '=', 'tipos_gastos.id')->where('proveedores.id', '=', $id)->get()->pluck('nombreTipo')->last();
    }

}
