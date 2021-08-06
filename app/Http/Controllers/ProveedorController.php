<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProveedorRequest;
use App\Models\Comunidad;
use App\Models\Proveedor;
use App\Models\ComunidadProveedor;
use App\Models\TipoGasto;
use App\Models\Pais;

class ProveedorController extends Controller {

    //
    private $msj = '';
    private $cmd_seleccionada = null;
    private $tiposGastos = TipoGasto::class;
    private $paises = Pais::class;
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->tiposGastos = TipoGasto::all();
        $this->paises = Pais::all();
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');
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
        
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');
        Proveedor::create($request->validated());
        $new_proveedor = Proveedor::orderBy('created_at', 'desc')->first();
        
        ComunidadProveedor::create([
            'comunidad_id' => $this->cmd_seleccionada->id,
            'proveedor_id' => $new_proveedor->id,
            'created_at' => $new_proveedor->created_at,
            'updated_at' => $new_proveedor->updated_at
        ]);

       return redirect()->route('proveedores.pasarComunidad', $this->cmd_seleccionada)->with('status', [$this->msj, 'alert-success']);
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
            'tiposGastos' => $this->tiposGastos,
            'paises' => $this->paises,
            'btnText1' => 'Edit',
            'btnText2' => 'Back',
            'btndisabled' => 'disabled'
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
        
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');

        $this->msj = 'El proveedor fué eliminado con éxito';

        $proveedor->delete();

        return redirect()->route('proveedores.pasarComunidad', $this->cmd_seleccionada)->with('status', [$this->msj, 'alert-danger']);
    }

    public function select(Proveedor $proveedor) {

        $this->msj = "Has seleccionado el proveedor";

        return $this->msj . $proveedor;
    }

    public function pasarComunidad(Comunidad $comunidad) {

        session()->put('cmd_seleccionada', $comunidad);
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');

        return view('proveedores.index', [// llamamos al Modelo
            'cmd_seleccionada' => $this->cmd_seleccionada
        ]);
    }

}
