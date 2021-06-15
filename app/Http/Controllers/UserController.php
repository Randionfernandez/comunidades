<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users=auth()->User::all();
        // $users = User::paginate(5);
        $users=User::latest()->paginate(5);
        return view('user.index')->with('users',$users);


      // return view('user.index',compact('users'))
      // ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //muestra los usuarios logueados en la app
    public function list()
    {
        return view('user.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
public function create(/*$id*/)
{
          // $propiedad = Propiedad::findOrFail($id);
    return view('user.create');

}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      DB::table('users')->insert([
        'name'=>$request->name,
        'apellido1'=>$request->Apellido1,
        'apellido2'=>$request->Apellido2,
        'nif'=>$request->nif,
        'telefono'=>$request->telefono,
        'calle'=>$request->calle,
        'portal'=>$request->portal,
        'bloque'=>$request->bloque,
        'escalera'=>$request->escalera,
        'piso'=>$request->piso,
        'puerta'=>$request->puerta,
        'cod_pais'=>$request->Cod_pais,
        'cp'=>$request->cp,
        'pais'=>$request->pais,
        'provincia'=>$request->provincia,
        'localidad' => $request->localidad,
        //'limitMaxFreeCommunities'=> 2,
        'role'=>$request->role,
        'num_cta' =>$request->num_cta,
        'email'=>$request->email,
        'password'=>$request->password,
    ]);
      return redirect('/user')->with('success', 'Propietario agregado');
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request->get('name');
        $user->apellido1=$request->get('apellido1');
        $user->apellido2=$request->get('apellido2');
        $user->email=$request->get('email');
        $user->role=$request->get('role');
        $user->nif=$request->get('nif');
        $user->telefono=$request->get('telefono');
        $user->calle=$request->get('calle');
        $user->portal=$request->get('portal');
        $user->bloque=$request->get('bloque');
        $user->escalera=$request->get('escalera');
        $user->piso=$request->get('piso');
        $user->puerta=$request->get('puerta');
        $user->cod_pais=$request->get('cod_pais');
        $user->cp=$request->get('cp');
        $user->pais=$request->get('pais');
        $user->provincia=$request->get('provincia');
        $user->localidad=$request->get('localidad');


        $user->save();

        return redirect('/user')->with('success', 'Configuración actualizada correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('/user')->with('success', 'Propietario eliminado');

    }
}
