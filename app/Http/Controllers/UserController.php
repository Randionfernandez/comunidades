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
        $users=User::all();
        return view('user.index')->with('users',$users);
      // $propietarios = User::latest()->paginate(5);

      // return view('user.index',compact('propietarios'))
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
        'dni'=>$request->dni,
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
        'password'=>$request->password,
        'email'=>$request->email,
    ]);
      return $request;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
