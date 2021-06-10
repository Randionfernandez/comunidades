<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Propietario;
use App\Http\Requests\PropietariosRequest;
use Illuminate\Support\Facades\DB;

class PropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("propietario");
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
    public function store(PropietariosRequest $request)
    {
         
      DB::table('propietarios')->insert([
            'Tratamiento'=>$request->Tratamiento,
            'Nombre'=>$request->Nombre,
            'Apellido1'=>$request->Apellido1,
            'Apellido2'=>$request->Apellido2,
            'Tipo'=>$request->Tipo,
            'Fecha'=>$request->Fecha,
            'DNI'=>$request->DNI,
            'Email'=>$request->Email,
            'Telefono'=>$request->Telefono,
            'Calle'=>$request->Calle,
            'Portal'=>$request->Portal,
            'Bloque'=>$request->Bloque,
            'Escalera'=>$request->Escalera,
            'Piso'=>$request->Piso,
            'Puerta'=>$request->Puerta,
            'Codigo_pais'=>$request->Codigo_pais,
            'CP'=>$request->CP,
            'Pais'=>$request->Pais,
            'Provincia'=>$request->Provincia,
            'Localidad' => $request->Localidad,
            'created_at' => now(),
            'updated_at' => now(),
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
