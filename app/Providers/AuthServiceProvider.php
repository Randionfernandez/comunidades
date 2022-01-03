<?php

namespace App\Providers;

use App\Models\Comunidad;
use App\Models\Team;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot() {
        $this->registerPolicies();

// Definición de las gates de la aplicación
        Gate::after(function ($user) {
            return isSuperAdmin($user);
        });
// Solo el susuario indicado puede crear comunidades        
        Gate::define('create-comunidad', function (User $user) {
            return isSuperAdmin($user);
        });

// Edita solo si el usuario es miembro de esa comunidad
//        No testado
        Gate::define('edit-comunidad', function (User $user, Comunidad $comunidad) {
            return false;
            $items = DB::table('comunidad_user')
                    ->where('comunidad_id', $comunidad->id)
                    ->where('user_id', $user->id)
//                    ->where('role_name', 'Admin')    // aún no existe este campo
                    ->count();
            if ($items == 1)  // más de un item no puede haber
                return true;
        });

// Autoriza a borrar solo si el usuario es el indicado en el código
        Gate::define('delete-comunidad', function (User $user) {
            return ($user->email === 'randion@cifpfbmoll.eu');
        });
//         Fin definición de las gates
    }

}
