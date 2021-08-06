<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CuentaRequest;
use App\Models\Cuenta;
use App\Models\Divisa;

class CuentaController extends Controller
{
    
    private $msj = '';
    private $cmd_seleccionada = null;
    private $divisas = null;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');
        $this->divisas = Divisa::all();
    }
    
    public function index()
    {
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');
        
        return view('cuentas.index', [
            'cuentas' => $this->cmd_seleccionada->cuentas,
            'title' => 'Listado de cuentas bancarias'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cuentas.create', [
            'cuenta' => new Cuenta,
            'divisas' => $this->divisas,
            'btnText1' => 'Save', 
            'btnText2' => 'Cancel',
            'title' => 'Create Cuentas',
            'btndisabled' => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CuentaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaRequest $request)
    {
        $this->msj = 'La cuenta fué creada con éxito';
        
        $this->cmd_seleccionada = session()->get('cmd_seleccionada');
        
        $request->merge([
            'comunidad_id' => $this->cmd_seleccionada->id
        ]);
        
        Cuenta::create($request->validated());
        
        return redirect()->route('cuentas.index')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        return view('cuentas.show', [
            'cuenta' => $cuenta,
            'divisas' => $this->divisas,
            'title' => 'Bank account',
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'disabled',
            'comunidad' => session()->get('cmd_seleccionada')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        return view('cuentas.edit', [
            'cuenta' => $cuenta,
            'divisas' => $this->divisas,
            'title' => 'Edit Cuenta',
            'btnText1' => 'Update', 
            'btnText2' => 'Back', 
            'btndisabled' => '',
            'comunidad' => session()->get('cmd_seleccionada')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CuentaRequest  $request
     * @param  Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaRequest $request, Cuenta $cuenta)
    {
        $this->msj = 'La cuenta fué actualizada con éxito';
        
        $cuenta->update($request->validated());

        return redirect()->route('cuentas.show', $cuenta)->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta)
    {
        $this->msj = 'La cuenta fué eliminada con éxito';
        
        $cuenta->delete();

        return redirect()->route('cuentas.index', $cuenta)->with('status', [$this->msj, 'alert-danger']);
    }
}
