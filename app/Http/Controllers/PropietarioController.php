<?php

namespace App\Http\Controllers;

// use App\Models\Propietario;
use App\Models\User;
use App\Models\Propiedad;
use App\Models\Comunidad;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // $propietarios =Propietario::get();
        // return view(propietario.index, compact('propietarios'));
        $propietarios = User::with('propiedad')->get();

        foreach ($propietarios as $propietario) {
            echo $propietario->propiedad->name . '';
            User::withCount('propiedad')->get();
        }


    }

//muestra las acciones del menu Propietario
    public function list()
    {
        return view('propietario.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'ref_ca' => 'required|max:255',
        'num_cta' => 'required|max:255',

    ]);

       if ($validator->fails()) {
        return redirect('propietario/create')
        ->withErrors($validator)
        ->withInput();
    }

    dd($request->all());
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
