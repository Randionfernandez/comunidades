<?php

namespace App\Http\Controllers;

use App\Models\Propiedad;
use App\Models\TipoPropiedad;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PropiedadRequest;

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
        
        $activeCommunity = session()->get('activeCommunity');
        $propiedades = $activeCommunity->propiedades()->get();
        
        return view('propiedades.index', [
            'comunidad' => $activeCommunity,
            'propiedades' => $propiedades
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$tipoPropiedades = TipoPropiedad::all();
        $tipoPropiedades = TipoPropiedad::all();
        $propietarios = User::all();
        
        return view('propiedades.create', [
            'propiedad' => new Propiedad,
            'tipoPropiedades' => $tipoPropiedades,
            'propietarios' => $propietarios,
            'btnText1' => 'Save',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'title' => 'Create Propiedad'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PropiedadRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropiedadRequest $request)
    {
        $this->msj = 'La propiedad fué creada con éxito';
        
        $request->merge([
            'comunidad_id' => $request->session()->get('activeCommunity')->id
        ]);
        
        //$propiedades = $request->session()->get('activeCommunity')->propiedades()->get('name');
        
        Propiedad::create($request->validated());
        
        return redirect()->route('propiedades.index')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedad $propiedad)
    {
        
        $activeCommunity = session()->get('activeCommunity');
        $tipoPropiedades = TipoPropiedad::all();
        //$tipoPropiedades = ['local','piso','atico'];
        $propietarios = User::all();
        
        return view('propiedades.show', [
            'comunidad' => $activeCommunity,
            'propiedad' => $propiedad,
            'propietarios' => $propietarios,
            'tipoPropiedades' => $tipoPropiedades,
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'disabled'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedad $propiedad)
    {
        $tipoPropiedades = TipoPropiedad::all();
        //$tipoPropiedades = ['local','piso','atico'];
        $propietarios = User::all();
        
        return view('propiedades.edit', [
            'propiedad' => $propiedad,
            'tipoPropiedades' => $tipoPropiedades,
            'propietarios' => $propietarios,
            'btnText1' => 'Update',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'title' => 'Create Propiedad'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PropiedadRequest  $request
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function update(PropiedadRequest $request, Propiedad $propiedad)
    {
        $this->msj = 'La comunidad fué actualizada con éxito';
        $color = 'alert-success';
        
        $propiedad->update($request->validated());

        return redirect()->route('propiedades.show', $propiedad)->with('status', [$this->msj, $color]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedad  $propiedad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedad $propiedad, Request $request)
    {
        $this->msj = 'La comunidad fué eliminada con éxito';
        $color = 'alert-danger';
        
        $propiedad->delete();

        return redirect()->route('propiedades.index', $propiedad)->with('status', [$this->msj, $color]);
    }
}
