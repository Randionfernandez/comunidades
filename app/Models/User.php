<?php

namespace App\Models;
use App\Role;
use App\Comunidad;
use App\Propiedad;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'email',
        'password',
        // 'tipo',
        // 'fecha',
        'nif',
        'telefono',
        'calle',
        'portal',
        'bloque',
        'escalera',
        'piso',
        'puerta',
        'codigo_pais',
        'cp',
        'pais',
        'provincia',
        'localidad'
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

    public function comunidades() {
        return $this->belongsToMany(Comunidad::class, 'comunidad_user','user_id','comunidad_id')->withTimestamps();
    }

    public function role() {
        return $this->belongsToMany(Comunidad_User::class, 'comunidad_user','user_id','comunidad_id')->withTimestamps();
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
 public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
 public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('role', $role)->first()) {
            return true;
        }
        return false;
    }

        public function hasRolePropiedad($id,$role)
    {
        if ($this->propiedades()->wherePivot('propiedad_id', '=', $id)->wherePivot('role_id', '=', $role)->first()) {
            return true;
        }
        return false;
    }

    // public function propiedades() {
    //     return $this->belongsToMany(Propiedad::class, 'propiedad_user','user_id','comunidad_id')->withTimestamps();
    // }

   public function propiedades()
    {
        return $this->belongsToMany(Propiedad::class)->withTimestamps();
    }

}
