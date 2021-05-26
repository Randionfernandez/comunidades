<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use App\Models\Propiedad;
use App\Models\User;
use App\Models\Comunidad;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         if ($request->user()->hasRole('admin')) {
            $propiedades=Propietario::Paginate(10);
        }else
        $propiedades=Propietario::simplePaginate(10);
         /*según el role puede ver o no las propiedades:

    los propietarios como 'guest' solo podran acceder a la vista de su comunidad, sus cuotas pendientes y el estado de su propiedad dentro de la comunidad..etc,

    El administrador de la propiedad como 'admin' tendrá permisos de visualización completa y se le permite agregar, eliminar y actualizar registros en cada una de las tablas */

    $request->user()->authorizeRoles(['admin', 'guest']);
    /*  return view('dashboard.propiedad.index', compact('propiedades'));*/

        //retorna la lista de las propiedades
    $propiedades=Propietario::all();
    return view('propietario.index', compact('propietario'))->with('propietario',$propietario);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //crea los propietarios tras haberse registrado
          $propiedad = Propiedad::findOrFail($id);
        return view('propietario.create', compact('propiedad'));
    }

    /**
     * Store a newly created resource in storage.
     *Almacena el propietario en la base de datos tras enviar el registro,
     captura con el método get() los campos name="" del formulario.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $messages = [
            'cad_ref_com.required' => 'El campo "Referencia catastral" es necesario.',
            'cad_ref_com.unique' => 'La referencia catastral ya esta en uso.',
            'address.required' => 'El campo "Dirección" es necesario.',
            'apart_num.required' => 'El campo "Numero de apartamentos" es necesario.',
        ];
         $validatedPropietario = ([
        'email' => 'required|unique:users|max:255',
        'nif' => 'required|max:255',
        '' => 'required|max:255|integer|min:1'
    ]);
         $propietario = Propietario::create($this->validate($request, $validatedPropietario, $messages));
 $request->merge(['user_id' => $users->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $propietario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propietario $propietario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        //
    }
}
