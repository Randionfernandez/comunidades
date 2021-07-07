<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovimientoRequest;
use App\Models\Movimiento;
use App\Models\CuentaBancaria;
use App\Models\DistribucionGasto;
use App\Models\Ingreso;
use App\Models\TipoGasto;
use App\Models\Propiedad;
use App\Models\User;

class MovimientoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
        $movimientos = Movimiento::orderBy('id')->get();
        $ingreso = Ingreso::sum('cantidad');
        $totalGastos = Movimiento::where('concepto', '!=', 1)->sum('cantidad');
        $totalIngresos = Movimiento::where('concepto', '=', 1)->sum('cantidad');

        return view('movimientos.index', [
            'movimientos' => $movimientos,
            'ingresos' => $ingreso,
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
        $cuentas = CuentaBancaria::all();
        $propietarios = User::all();
        $propiedades = Propiedad::all();
        $grupos = DistribucionGasto::distinct('name')->get();
        $tiposGastos = TipoGasto::all();
        
        return view('movimientos.create', [
            'cuentas' => $cuentas,
            'propiedades' => $propiedades,
            'propietarios' => $propietarios,
            'grupos' => $grupos,
            'movimiento' => new Movimiento(),
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
    public function store(MovimientoRequest $request) {

        Movimiento::create($request->all());
        return redirect()->route('movimientos.index')->with('mensaje', 'Se ha creado el movimiento exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movimiento $movimiento
     * @return \Illuminate\Http\Response
     */
    public function show(Movimiento $movimiento) {
        //
        
        $cuentas = cuentaBancaria::all();
        $propiedades = Propiedad::all();
        $grupos = DistribucionGasto::distinct('name')->get();
        $tiposGastos = TipoGasto::all();
        
        return view('movimientos.show', [
            'movimiento' => $movimiento,
            'comunidad' => session()->get('activeCommunity'),
            'cuentas' => $cuentas,
            'propiedades' => $propiedades,
            'grupos' => $grupos,
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
     * @param  \App\Models\Movimiento  $movimiento1
     * @return \Illuminate\Http\Response
     */
    public function edit(Movimiento $movimiento) {
        //
        $cuentas = CuentaBancaria::all();
        $propiedades = Propiedad::all();

        $grupos = DistribucionGasto::distinct('name')->get();
        $movimiento1 = Movimiento::where('concepto', '!=', 'ingreso')->findOrFail($movimiento->id);
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
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movimiento $movimiento) {
        //
        $movimiento1 = Movimiento::findOrFail($movimiento->id);
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
     * @param  \App\Models\Movimiento  $movimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movimiento $movimiento) {
        //
        Movimiento::findOrFail($movimiento->id)->delete();
        return redirect()->route('movimientos.index')->with('mensaje', 'Se ha elimino correctamente');
    }

}
