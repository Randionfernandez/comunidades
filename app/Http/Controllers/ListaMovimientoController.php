<?php

namespace app\Http\Controllers;

use App\Models\Distribucion;
use App\Models\ListaMovimiento;
use App\Models\Movimiento;
use App\Models\PropiedadUser;
use Illuminate\Http\Request;

class ListaMovimientoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        //

        $prueba = array();
        $propiedad = request()->get('propiedad');
        $gastos = Distribucion::where('propiedad', '=', $propiedad)->get(['coeficiente', 'unidadRegistral', 'name']);
        $totalPropiedades = PropiedadUser::count('propiedad');
        $dineroPropiedad = Movimiento::where('propiedad', '=', $propiedad)->where('concepto', '=', 'ingreso')->get('cantidad')->sum('cantidad');
        $gastosPropiedad = 0;
        $total = 0;

        $arrayIngresado['ingresado'] = $dineroPropiedad;

        foreach ($gastos as $gasto) {
            $concepto = Movimiento::where('grupo', '=', $gasto['name'])->get(['concepto', 'cantidad']);
            if ($gasto['name'] == 'coeficiente') {
                $operacion = sprintf("%01.2f", ($gasto['coeficiente'] / 100) * $concepto[0]['cantidad']);
            } else {
                $operacion = sprintf("%01.2f", $concepto[0]['cantidad'] / $totalPropiedades);
            }


            $restante = $dineroPropiedad - $operacion;
            $total += $dineroPropiedad - $operacion;

            array_push($prueba, ['ingresado' => $dineroPropiedad,
                'concepto' => $concepto[0]['concepto'],
                'operacion' => $operacion, 'restante' => $restante]);

            $dineroPropiedad -= $operacion;

            $gastosPropiedad += $operacion;

            return view('movimientos.listaMovimientos', compact('propiedad', 'prueba', 'total'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listaMovimientos  $listaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function show(ListaMovimiento $listaMovimiento) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListaMovimiento  $listaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(ListaMovimiento $listaMovimiento) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listaMovimientos  $listaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaMovimiento $listaMovimiento) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listaMovimientos  $listaMovimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(listaMovimiento $listaMovimiento) {
        //
    }

}
