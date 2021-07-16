<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Http\Requests\CuentaRequest;
use Illuminate\Http\Request;
use App\Models\Pais;

class CuentaController extends Controller
{
    private $msj = '';
    private $paises = Pais::class;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cuentas = Cuenta::orderBy('id', 'asc')->get();
        //return view('cuenta/cuenta',['cuenta' => $cuentas]);
        return view('cuentas.index',compact('cuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $this->paises = Pais::all();
        
        return view('cuentas.create',[
            'cuenta' => new Cuenta,
            'title' => 'Create Cuenta Bancaria',
            'btnText1' => 'Save', 
            'btnText2' => 'Cancel', 
            'btndisabled' => '',
            'paises' => $this->paises
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CuentaRequest $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué creada con éxito';
        
        Cuenta::create($request->validated());
        return redirect('/cuentas')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function show(Cuenta $cuenta)
    {
        $this->paises = Pais::all();
        
        return view('cuentas.show', [
            'cuenta' => $cuenta,
            'comunidad' => session()->get('activeCommunity'),
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'disabled',
            'paises' => $this->paises
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Cuenta $cuenta)
    {
        //
        $this->paises = Pais::all();
        return view('cuentas.edit',[
            'cuenta' => $cuenta,
            'title' => 'Edit Cuenta Bancaria',
            'btnText1' => 'Update',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'paises' => $this->paises
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CuentaRequest  $request
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Cuenta $cuenta, CuentaRequest $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué actualizada con éxito';
        
        $cuenta->update($request->validated());

        return redirect()->route('cuentas.index')->with('status', [$this->msj, 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuenta  $cuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cuenta $cuenta, Request $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué eliminada con éxito';
        $cuenta->delete();
        return redirect()->route('cuentas.index')->with('status', [$this->msj, 'alert-danger']);

    }
}
