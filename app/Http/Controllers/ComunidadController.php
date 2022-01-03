<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComunidadRequest;
use App\Models\Comunidad;
use App\Models\Comunidad_User;
//use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
//use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ComunidadController extends Controller {

    private $msj = '';

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('comunidades.index', ['comunidades' => auth()->user()->comunidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
//  (pendiente) Controlar si el usuario tiene permiso para crear comunidades y no supera su límite
//        if (auth()->user()->comunidades->count() >= env('APP_MAX_FREE_COMMUNITIES', 2)) {
//
//            // comprobar si tiene licencia para crear comunidades de pago (pendiente)
//        } else {
// primera forma de autorizar--------------------------------
        if (Gate::allows('create-comunidad')) {
            return view('comunidades.create');
        }

        Abort(403);

// 2ª forma de autorizar 
        abort_unless('create-comunidad', 403);
        return view('comunidades.create');

// 3ª forma de autorizar
//        Gate::authorize('create-comunidad')
//                 o bien
//        $this->authorize('create-comunidad', 403)
//        return view('comunidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ComunidadRequest $request) {
//        dd($request->file('doc'));

        $comunidad = Comunidad::create($request->all());

        if (request()->hasFile('doc')) {
            // guarda el fichero en una subcarpeta cuyo nombre es el cif de la comunidad        
            $comunidad->documentos()->create([
                'carpeta' => "Comunidad",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->usuarios()->attach(auth()->user()->id);

        // asignamos el rol de 'Admin' en la tabla 'comunidad_user'
        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->first();
        $cu->assignRole('Admin');

        return redirect()->route('comunidades.index')->with('status', ['msj' => "La comunidad $comunidad->denom, fue creada correctamente", 'alert' => 'alert-success']);
    }

    /**
     * Recuperado método show en las rutas de 'web', (problemas cuando ejecuto
     * Comunidad desde del menu principal desde la vista 'cuenta' si el usuario no
     * tiene permiso para 'edit-comunidad'.
     */
    public function show($comunidad) {
        return view(comunidades . show, ['comunidad' => $comunidad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function edit(Comunidad $comunidad) {
//        Abort_unless(Gate::allows('edit-comunidad',$comunidad), 403);
//        $this->authorize('edit-comunidad');
// Otra forma de autorizar   
//        if (Gate::allows('edit-comunidad')) {
        return view('comunidades.edit', ['comunidad' => $comunidad]);
//        }
//        Abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Comunidad  $comunidad
     * @param  ComunidadRequest  $request
     * @return Response
     */
    public function update(Comunidad $comunidad, ComunidadRequest $request) {
        $this->authorize('edit-comunidad');
        
        if (request()->hasFile('doc')) {
            // guarda el fichero en una subcarpeta cuyo nombre es el cif de la comunidad        
            $comunidad->documentos()->create([
                'carpeta' => "Comunidad",
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'name' => $request->file('doc')->getClientOriginalName(),
                'hash_name' => $request->file('doc')->store(request()->cif),
            ]);
        }

        $comunidad->update($request->validated());
        $this->msj = 'La comunidad ' . $comunidad->denom . ', fue actualizada con éxito';

        return redirect()->route('comunidades.index', $comunidad)->with('status', ['msj' => $this->msj, 'alert' => 'alert-info']);
    }

    /**
     * Remove the specified resource from storage.
     * 
     *      Se hace un borrado lógico de la comunidad (SoftDelete) y un borrado físico de las
     * filas de comunidad_user que contienen enlaces con esta comunidad.
     *      También en model_has_role se borrar físicamente los roles con los 'model_id' 
     * borrados en comunidad_user.
     * Nota: 
     *      Como el borrado de 'comunidad' es lógico, los borrados en 'comunidad_user' no se propagan
     * en cascada, como consta en la migración.
     * ToDo:
     *      El procedimiento de borrado de una comunidad tiene fuertes implicaciones en la calidad del 
     * servicio, por tanto, en versiones más evolucionadas debería replantearse; de momento nos sirve esto.
     *
     * @param  Comunidad  $comunidad
     * @return Response
     */
    public function destroy(Comunidad $comunidad) {
        Gate::allows('delete-comunidad');

        $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->get();
        $aux = $cu->where('user_id', auth()->id())->first();
        if ($aux->hasRole('Admin')) {//  $aux ¿accede a la BD? comprobar
            $cu = Comunidad_User::where('comunidad_id', $comunidad->id)->get();

            $this->msj = "La comunidad -- " . $comunidad->denom . " --, fue eliminada con éxito";

            foreach ($cu as $cmd_usr) {
                $cmd_usr->roles()->detach();
            }
// Elimina los enlaces de usuarios que tienen acceso a la comunidad. No aplica SoftDeletes,
//  a pesar de constar en el modelo Comunidad_User; pendiente de solucionar para no perder esa información
            $comunidad->usuarios()->detach();
            $comunidad->delete();  // marca la comunidad como borrada: softDelete.

            session()->forget('cmd_seleccionada');
            return redirect()->route('comunidades.index')->with('status', ['msj' => $this->msj, 'alert' => 'alert-danger']);
        }

        Abort(403);
    }

    public function seleccionar(Comunidad $comunidad) {
        session(['cmd_seleccionada' => $comunidad]);
        return view('dashboard', compact('comunidad'));
    }

}
