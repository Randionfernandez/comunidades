<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Illuminate\Support\Facades\View::share('navLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard']
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkLinks', [
            ['href' => 'dashboard', 'name' => 'dashboard', 'text' => 'Dashboard'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Incidencias tabla'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.create', 'text' => 'Comunidades'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.show', 'text' => 'Acciones'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.edit', 'text' => 'Personas'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.delete', 'text' => 'Inmuebles'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.restore', 'text' => 'Presupuestos'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.eliminar', 'text' => 'Honorarios'],
            ]);
        
        \Illuminate\Support\Facades\View::share('navDarkCommunitiesLinks', [
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Acciones'],
            ['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Comunidad'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Contactos'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Conceptos'],
            ['href' => 'juntas.index', 'name' => 'juntas.index', 'text' => 'Juntas'],
            ['href' => 'cuentasBancarias.index', 'name' => 'cuentasBancarias.index', 'text' => 'Cuentas bancarias'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Cuotas'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Diario'],
            ['href' => 'distribucion.index', 'name' => 'distribucion.index', 'text' => 'Distribuciones'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Documentos'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Fondos'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Foro'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Importaciones'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Incidencias'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Informes'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Liquidaciones'],
            ['href' => 'movimientos.index', 'name' => 'movimientos.index', 'text' => 'Movimientos'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Obligaciones'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Posicion'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Presupuestos'],
            //['href' => 'propiedades.index', 'name' => 'propiedades.index', 'text' => 'Propiedades'],
            ['href' => 'proveedores.pasarComunidad', 'name' => 'proveedores.pasarComunidad', 'text' => 'Proveedores'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Remesas'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Lecturas de agua'],
            //['href' => 'comunidades.index', 'name' => 'comunidades.index', 'text' => 'Saldos iniciales']
        ]);
        
    }
}
