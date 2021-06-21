<?php

namespace App\Http\Controllers;

use App\Models\ingresos;
use App\Models\cuentasBancarias;
use App\Models\movimientos;
use App\Models\Propietario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use  App\Http\Requests\ingreso;
use App\Models\distribucion_gastos;
use App\Models\Propiedades_User;

class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ingresos = Movimientos::where('concepto', '=', 'ingreso')->distinct('propiedad')->get();
        //  dd($ingresos);
        return view('ingresos/ingresos', compact('ingresos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ingreso $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function show($propiedad)
    {
        //
        $prueba = array();
        
        $gastos = distribucion_gastos::where('propiedad','=',$propiedad)->get(['coeficiente','nombre']);
        $dineroPropiedad = Movimientos::where('propiedad', '=', $propiedad)->where('concepto', '=', 'ingreso' )->get('cantidad')->sum('cantidad');
        $totalPropiedades = Propiedades_User::count('propiedad');
        $total = 0;   
        $gastosPropiedad = 0;

        for ($i=0; $i < count($gastos) ; $i++) {
           $concepto = Movimientos::where('grupo' ,'!=', $gastos[$i]['nombre'])->get();
        
           $unidad = Movimientos::where('grupo','=',$gastos[$i]['nombre'])->get();

            for ($j=0; $j < count($concepto) ; $j++) {

                for ($h=0; $h <  count($unidad) ; $h++) {
                   if ($unidad->count() && $unidad[$h]->concepto != 'ingreso') {
                       $operacion =  sprintf("%01.2f",$concepto[$j]['cantidad'] / $totalPropiedades);
                   }
               }

                $coeficiente = distribucion_gastos::where('nombre','=',$concepto[$j]['grupo'])->where('propiedad','=',$propiedad)->get(['coeficiente', 'nombre']);
                
                if($coeficiente[$j]->nombre == 'unidadRegistral'){
                    $coeficiente[$j]->coeficiente = 0;
                }
                
                if($coeficiente[$j]['coeficiente'] != 0){
                    
                    for ($e=0; $e < count($coeficiente) ; $e++) {
                        $operacion =  sprintf("%01.2f",($coeficiente[$e]['coeficiente']/100) * $concepto[$j]['cantidad']);
                    }

                    $restante = $dineroPropiedad - $operacion;
                    $total += $dineroPropiedad - $operacion;

                    array_push($prueba,[
                        'ingresado' => $dineroPropiedad,
                        'concepto' => $concepto[$j]['concepto'],
                        'operacion' => $operacion ,
                        'restante' => $restante
                    ]);

                    $dineroPropiedad -= $operacion ;
                    $gastosPropiedad += $operacion;
                }
            }
        }
    
        return view('ingresos/listaMovimientos',compact('propiedad','prueba','total'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function edit(ingresos $ingresos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ingresos $ingresos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function destroy(ingresos $ingresos)
    {
        //
    }
}
