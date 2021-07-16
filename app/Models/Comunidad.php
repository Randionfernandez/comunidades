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
        return $this->hasMany(Propiedad::class);
    }

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }
    
//    public function comunidades_user() {
//        return $this->hasMany(Comunidad_User::class);
//    }

    public function usuarios() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    
    public function nombreRole(Comunidad $comunidad){
        return Role::join('comunidad_user', 'roles.id', '=', 'comunidad_user.role_id')->where('comunidad_user.comunidad_id', '=', $comunidad->id)->where('comunidad_user.user_id', '=', auth()->user()->id)->get()->pluck('role')->last();
    }

}