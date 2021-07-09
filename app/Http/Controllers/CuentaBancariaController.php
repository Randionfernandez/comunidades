<?php

namespace App\Http\Controllers;

use App\Models\CuentaBancaria;
use App\Http\Requests\CuentaBancariaRequest;
use Illuminate\Http\Request;
use App\Models\Pais;

class CuentaBancariaController extends Controller
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
        $cuentasBancarias = CuentaBancaria::orderBy('id', 'asc')->get();
        //return view('cuentaBancaria/cuentaBancaria',['cuentaBancaria' => $cuentasBancarias]);
        return view('cuentasBancarias.index',compact('cuentasBancarias'));
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
        
        return view('cuentasBancarias.create',[
            'cuentaBancaria' => new CuentaBancaria,
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
    public function store(CuentaBancariaRequest $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué creada con éxito';
        
        CuentaBancaria::create($request->validated());
        return redirect('/cuentasBancarias')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function show(CuentaBancaria $cuentaBancaria)
    {
        $this->paises = Pais::all();
        
        return view('cuentasBancarias.show', [
            'cuentaBancaria' => $cuentaBancaria,
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
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function edit(CuentaBancaria $cuentaBancaria)
    {
        //
        $this->paises = Pais::all();
        return view('cuentasBancarias.edit',[
            'cuentaBancaria' => $cuentaBancaria,
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
     * @param  \Illuminate\Http\CuentaBancariaRequest  $request
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function update(CuentaBancaria $cuentaBancaria, CuentaBancariaRequest $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué actualizada con éxito';
        
        $cuentaBancaria->update($request->validated());

        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CuentaBancaria  $cuentaBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(CuentaBancaria $cuentaBancaria, Request $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué eliminada con éxito';
        $cuentaBancaria->delete();
        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-danger']);

    }
}
