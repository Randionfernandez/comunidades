<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorRequest;
use App\Models\Comunidad;
use App\Models\Proveedor;
use App\Models\ComunidadProveedor;
use App\Models\TipoGasto;
use App\Models\Calificacion;
use App\Models\Figura;
use App\Models\Pais;

class ProveedorController extends Controller {

    //
    private $msj = '';
    private $activeCommunity = null;
    private $tiposGastos = TipoGasto::class;
    private $calificaciones = Calificacion::class;
    private $figuras = Figura::class;
    private $paises = Pais::class;
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->tiposGastos = TipoGasto::all();
        $this->calificaciones = Calificacion::all();
        $this->figuras = Figura::all();
        $this->paises = Pais::all();
        $this->activeCommunity = session()->get('activeCommunity');
    }
    
    public function index() {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        /* if ( !auth()->user()->hasTeamPermission(Team::find(auth()->user()->current_team_id), 'server:create')) {
          abort(401, 'You cannot see');
          } */
        
        return view('proveedores.create', [
            'proveedor' => new Proveedor(),
            'tiposGastos' => $this->tiposGastos,
            'calificaciones' => $this->calificaciones,
            'figuras' => $this->figuras,
            'paises' => $this->paises,
            'btndisabled' => '',
            'title' => 'New Provider'
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProveedorRequest $request) {

        $this->msj = 'El proveedor fué creado con éxito';
        
        $this->activeCommunity = session()->get('activeCommunity');
        Proveedor::create($request->validated());
        $new_proveedor = Proveedor::orderBy('created_at', 'desc')->first();
        
        ComunidadProveedor::create([
            'comunidad_id' => $this->activeCommunity->id,
            'proveedor_id' => $new_proveedor->id,
            'created_at' => $new_proveedor->created_at,
            'updated_at' => $new_proveedor->updated_at
        ]);

       return redirect()->route('proveedores.pasarComunidad', $this->activeCommunity)->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor) {
        //
        return view('proveedores.show', [
            'proveedor' => $proveedor,
            'btnText1' => 'Edit',
            'btnText2' => 'Back',
            'btndisabled' => 'disabled',
            'tiposGastos' => $this->tiposGastos,
            'calificaciones' => $this->calificaciones,
            'figuras' => $this->figuras,
            'paises' => $this->paises
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor) {
        
        return view('proveedores.edit', [
            'proveedor' => $proveedor,
            'tiposGastos' => $this->tiposGastos,
            'calificaciones' => $this->calificaciones,
            'figuras' => $this->figuras,
            'paises' => $this->paises,
            'btndisabled' => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ProveedorRequest  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Proveedor $proveedor, ProveedorRequest $request) {

        $this->msj = 'El proveedor fué actualizado con éxito';

        $proveedor->update($request->validated());

        return redirect()->route('proveedores.show', $proveedor)->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor) {
        
        $this->activeCommunity = session()->get('activeCommunity');

        $this->msj = 'El proveedor fué eliminado con éxito';

        $proveedor->delete();

        return redirect()->route('proveedores.pasarComunidad', $this->activeCommunity)->with('status', [$this->msj, 'alert-danger']);
    }

    public function select(Proveedor $proveedor) {

        $this->msj = "Has seleccionado el proveedor";

        return $this->msj . $proveedor;
    }

    public function pasarComunidad(Comunidad $comunidad) {

        session()->put('activeCommunity', $comunidad);
        $this->activeCommunity = session()->get('activeCommunity');

        return view('proveedores.index', [// llamamos al Modelo
            'activeCommunity' => $this->activeCommunity
        ]);
    }

}
