<?php

namespace App\Http\Controllers;

use App\Models\cuentasBancarias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCuentaBancaria;

class CuentasBancariasController extends Controller
{
    private $msj = '';
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
        $cuentasBancarias = new cuentasBancarias;
        return view('cuentaBancaria/crearCuentaBancaria',compact('cuentasBancarias'));
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
        
        cuentasBancarias::create($request->all());
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function edit(cuentasBancarias $cuentasBancarias,$id)
    {
        //
        $cuentasBancarias = cuentasBancarias::findOrFail($id);
        return view('cuentaBancaria/editarCuentasBancarias',compact('cuentasBancarias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cuentasBancarias  $cuentasBancarias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cuentasBancarias $cuentasBancaria)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué actualizada con éxito';
        
        $cuentasBancaria->nombre = $request->nombre;
        $cuentasBancaria->pais = $request->pais;
        $cuentasBancaria->dc = $request->dc;
        $cuentasBancaria->cuenta = $request->cuenta;
        $cuentasBancaria->bic = $request->bic;
        $cuentasBancaria->update();

        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cuentasBancarias  $cuentasBancaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(cuentasBancarias $cuentasBancaria)
    {
        //
        $this->msj = 'La Cuenta Bancaria fué eliminada con éxito';
        cuentasBancarias::findOrFail($cuentasBancaria->id)->delete();
        return redirect()->route('cuentasBancarias.index')->with('status', [$this->msj, 'alert-danger']);

    }
}
