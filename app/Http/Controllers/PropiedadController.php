<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use Illuminate\Http\Request;
use App\Http\Requests\propiedadesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PropiedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propiedades = Propiedad::latest()->paginate(5);
    
        return view('propiedades.index',compact('propiedades'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view("propiedades.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        DB::table('propiedades')->insert([
            'nombre'=>$request->nombre,
            'propietario'=>$request->propietario,
            'tipo'=>$request->tipo,
            'coeficiente'=>$request->coeficiente,
            'parte'=>$request->parte,
            'observaciones'=>$request->observaciones,
        ]);
        
        return redirect()->route('propiedades.index')
                        ->with('success','Propiedad creada');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        return view('propiedades.show',compact('propiedad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        return view('propiedades.edit',compact('propiedad'));
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
        $request->validate([
            'nombre'=>'required',
            'propietario'=>'required',

        ]);
    
        $propiedad->update($request->all());
    
        return redirect()->route('propiedades.index')
                        ->with('success','Propiedad actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad)
    {
        $propiedad->delete();
    
        return redirect()->route('propiedades.index')
                        ->with('success','Propiedad borrada');
    }
}
