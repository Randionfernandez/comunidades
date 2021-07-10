<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;

class Comunidad extends Model {

    use HasFactory;
    use SoftDeletes;

    protected $table = 'comunidades';
    protected $dates = ['deleted_at'];   // registramos la nueva columna ¿necesario en laravel 8?
    protected $fillable = [
        'cif',
        'fechalta',
        'activa',
        'gratuita',
        'partes',
        'denom',
        'direccion',
        'localidad',
        'provincia',
        'cp',
        'pais',
        'logo',
        'observaciones',
        'limitMaxFree'
    ];

    public function propiedades() {
        return $this->hasMany(Propiedad::class, 'comunidad_id', 'id');
    }

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }
    
    public function comunidades_users() {
        return $this->hasMany(ComunidadUser::class);
    }

    public function usuarios() {
        return $this->belongsToMany('user')->withTimestamps();
    }
    
    public function proveedor() {
        return $this->belongsToMany(Proveedor::class, 'comunidades_proveedores', 'comunidad_id', 'proveedor_id')->withTimestamps();
    }
    
    public function paises() {
        return $this->belongsTo(Pais::class, 'id', 'pais_id')->withTimestamps();
    }
    
    public function nombrePais($id){
        // $nombre_tipo = Tipo::findOrFail($id, ['nombreTipo']); 
        //$users = User::join('posts', 'users.id', '=', 'posts.user_id') ->get(['users.*', 'posts.descrption']);
        return $nombrePais = Comunidad::join('paises', 'comunidades.pais_id', '=', 'paises.id')->where('comunidades.id', '=', $id)->get()->pluck('nombrePais')->last();
    }
    
    public function juntas () {
        return $this->hasMany(Junta::class, 'comunidad_id', 'id');
    }
    
    public function nombreRole(Comunidad $comunidad){
        return Role::join('comunidad_user', 'roles.id', '=', 'comunidad_user.role_id')->where('comunidad_user.comunidad_id', '=', $comunidad->id)->where('comunidad_user.user_id', '=', auth()->user()->id)->get()->pluck('role')->last();
    }

}
