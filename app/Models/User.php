<?php

namespace App\Models;
//modelos
use App\Models\Acta;
use App\Models\Comunidad;
use App\Models\Convocatoria;
use App\Models\Propiedad;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'apellido1',
        'apellido2',
        'telefono',
        'nif',
        'Calle',
        'Portal',
        'Bloque',
        'Escalera',
        'Piso',
        'Puerta',
        'Codigo_pais',
        'cp',
        'Pais',
        'Provincia',
        'Localidad',
        'role',
        'num_cta',
        'email',
        'password',
        // 'limitMaxFreeCommunities',
        'propiedad_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    //relaciones
    public function propiedad()
    {
       return $this->hasOne(Propiedad::class,'propiedad_id')->withTimestamps();
   }

    public function acta() {
        return $this->hasMany(Acta::class);
    }

     public function convocatoria() {
        return $this->hasMany(Convocatoria::class);
    }


   //métodos

 /**Actualización para el role, busca en la columna role devolviendo un string

 public function getRolAttribute():string
 {
  return $this->role ==='admin' ? 'Administrador':'Invitado';
}

*/


/** fucnion scope de busqueda con una query que se anida a la petición principal de sql, recibe el primer parámetro obligatorio que es un consulta y el otro parametro opcinal que es el termino de búsqueda,en este caso se envia lo que estamos escribiendo en el campo */
public function scopeTermino($query,$termino){
    if ($termino === '') {
    return; //termino vacío para la funcion
}
return $query->where('name','like','%{$termino}%')
->orWhere('apellido1','like','%{$termino}%')
->orWhere('apellido2','like','%{$termino}%')
->orWhere('email','like','%{$termino}%')
->orWhere('nif','like','%{$termino}%');

}

public function scopeRole($query,$role){
  if ($role === '') {
    return; //termino vacío para la funcion
}
//método mágino que apunta a la columna role
return $query->whereRole($role);
}


}
