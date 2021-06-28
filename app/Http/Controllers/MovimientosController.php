<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreMovimientos;
use App\Models\movimientos;
use App\Models\cuentasBancarias;
use App\Models\distribucion_gastos;
use App\Models\ingresos;
use App\Models\TipoGasto;
use App\Models\Propiedades_User;

class MovimientosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $movimientos = movimientos::orderBy('id')->get();
        $ingresos = ingresos::sum('cantidad');
        $totalGastos = movimientos::where('concepto', '!=', 1)->sum('cantidad');
        $totalIngresos = movimientos::where('concepto', '=', 1)->sum('cantidad');

        return view('movimientos.index', [
            'movimientos' => $movimientos,
            'ingresos' => $ingresos,
            'totalGastos' => $totalGastos,
            'totalIngresos' => $totalIngresos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        $cuentas = cuentasBancarias::all();
        $propiedades = Propiedades_User::all();
        $grupos = distribucion_gastos::distinct('nombre')->get();
        $tiposGastos = TipoGasto::all();
        
        return view('movimientos.create', [
            'cuentas' => $cuentas,
            'propiedades' => $propiedades,
            'grupos' => $grupos,
            'movimiento' => new movimientos(),
            'tiposGastos' => $tiposGastos,
            'btnText1' => 'Create',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'title' => 'Create Movimiento'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovimientos $request) {

        movimientos::create($request->all());
        return redirect()->route('movimientos.index')->with('mensaje', 'se ha creado el movimiento exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movimientos $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(movimientos $movimiento) {
        //
        
        $cuentas = cuentasBancarias::all();
        $propiedades = Propiedades_User::all();
        $grupos = distribucion_gastos::distinct('nombre')->get();
        $tiposGastos = TipoGasto::all();
        
        return view('movimientos.show', [
            'cuentas' => $cuentas,
            'propiedades' => $propiedades,
            'grupos' => $grupos,
            'movimiento' => $movimiento,
            'tiposGastos' => $tiposGastos,
            'btnText1' => 'Create',
            'btnText2' => 'Cancel',
            'btndisabled' => 'disabled',
            'title' => 'Movimiento Show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movimientos  $movimiento1
     * @return \Illuminate\Http\Response
     */
    public function edit(movimientos $movimiento) {
        //
        $cuentas = cuentasBancarias::all();
        $propiedades = Propiedades_User::all();

        $grupos = distribucion_gastos::distinct('nombre')->get();
        $movimiento1 = movimientos::where('concepto', '!=', 'ingreso')->findOrFail($movimiento->id);
        $tiposGastos = TipoGasto::all();

        return view('movimientos.edit', [
            'cuentas' => $cuentas,
            'propiedades' => $propiedades,
            'grupos' => $grupos,
            'movimiento' => $movimiento1,
            'tiposGastos' => $tiposGastos,
            'btnText1' => 'Update',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'title' => 'Edit Movimientos'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\movimientos  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, movimientos $movimiento) {
        //
        $movimiento1 = movimientos::findOrFail($movimiento->id);
        $movimiento1->fechaValor = $request->fechaValor;
        $movimiento1->concepto = $request->concepto;
        $movimiento1->cantidad = $request->cantidad;
        $movimiento1->observaciones = $request->observaciones;
        $movimiento1->save();

        return redirect()->route('movimientos.index')->with('mensaje', 'Se ha actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movimientos  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(movimientos $movimiento) {
        //
        movimientos::findOrFail($movimiento->id)->delete();
        return redirect()->route('movimientos.index')->with('mensaje', 'Se ha elimino correctamente');
    }

}
