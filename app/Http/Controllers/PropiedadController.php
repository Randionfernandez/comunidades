<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\Comunidad;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
       private $msj = '';
    public function index()
    {
        return view('propiedad.index');

    }

         public function list()
    {
        return view('propiedad.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('adminltproperty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedad $propiedad)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad)
    {
        //
    }
      public function storeuser(Request $request)
    {

        $messages = [
            'comunidad_id.required' => 'El campo "Comunidad" es necesario.',
            'comunidad_id.unique' => 'El usuario ya existe en la comunidad.',
            'email.unique' => 'El mail ya esta en uso.',
            'email.required' => 'El campo "Mail de usuario" es necesario.',
            'role_id.required' => 'El campo "Rol" es necesario.',
        ];

        $email = User::select('id')->where('email', $request['email'])->first();

        if ($email === null) {
            return redirect()->back()->with('error', 'El mail no existe');
        } else {
            $validatedData =  $request->validate([
                'comunidad_id' => 'required|unique:community_user,community_id,NULL,id,user_id,' . $email->id . '|max:255',
                'email' => 'required|unique:community_user,user_id,NULL,id,comunidad_id,' . $request['community_id'] . '|max:255',
                'role_id' => 'required|max:255'
            ], $messages);

            $email = $email->id;
            $users = User::find($email);
            $users->communities()->attach($request['comunidad_id'], ['role_id' => $request['role_id']]);
            return redirect()->back()->with('success', 'El usuario ' . $request['email'] . ' ha sido agregado.');
        }
    }
}
