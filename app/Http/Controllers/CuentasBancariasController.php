<?php

namespace App\Http\Controllers;

use App\Models\cuentasBancarias;
use App\Http\Requests\StoreCuentaBancariaRequest;
use App\Http\Requests\StoreCuentaBancaria;
use Illuminate\Http\Request;
use App\Models\Pais;

class CuentasBancariasController extends Controller
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
        $cuentasBancarias = cuentasBancarias::orderBy('id', 'asc')->get();
        //return view('cuentaBancaria/cuentaBancaria',['cuentasBancarias' => $cuentasBancarias]);
        return view('cuentaBancaria.index',compact('cuentasBancarias'));
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
        $cuentasBancarias = new cuentasBancarias;
        
        return view('cuentaBancaria.create',[
            'cuentasBancarias' => $cuentasBancarias,
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
    public function store(StoreCuentaBancaria $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué creada con éxito';
        
        cuentasBancarias::create($request->validated());
        return redirect('/cuentasBancarias')->with('status', [$this->msj, 'alert-success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function show(cuentasBancarias $cuentasBancarias)
    {
        //
        $this->paises = Pais::all();
        return view('cuentaBancaria.show', [
            'cuentasBancarias' => $cuentasBancarias,
            'btnText1' => 'Show', 
            'btnText2' => 'Back', 
            'btndisabled' => 'disabled',
            'paises' => $this->paises
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function edit(cuentasBancarias $cuentasBancarias)
    {
        //
        $this->paises = Pais::all();
        return view('cuentaBancaria.edit',[
            'cuentasBancarias' => $cuentasBancarias,
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function update(cuentasBancarias $cuentasBancarias, StoreCuentaBancaria $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué actualizada con éxito';
        
        $cuentasBancarias->update($request->validated());

        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuentasBancarias $cuentasBancarias, Request $request)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué eliminada con éxito';
        $cuentasBancarias->delete();
        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-danger']);

    }
}
