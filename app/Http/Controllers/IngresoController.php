<?php

namespace app\Http\Controllers;

use App\Models\Ingreso;
use App\Http\Requests\IngresoRequest;
use App\Models\Distribucion;
use App\Models\PropiedadUser;
use App\Models\Movimiento;

class IngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ingresos = Movimiento::where('concepto', '=', 1)->distinct('propiedad_id')->get();
        //  dd($ingresos);
        return view('ingresos.index', compact('ingresos'));
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
    public function store(IngresoRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ingreso  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function show(Ingreso $ingreso)
    {
        //
        $prueba = array();
        
        $gastos = Distribucion::where('propiedad_id','=',$ingreso->propiedad)->get(['coeficiente','nombre']);
        $dineroPropiedad = Movimiento::where('propiedad_id', '=', $ingreso->propiedad)->where('concepto', '=', 'ingreso' )->get('importe')->sum('importe');
        $totalPropiedades = PropiedadUser::count('propiedad_id');
        $total = 0;   
        $gastosPropiedad = 0;

        for ($i=0; $i < count($gastos) ; $i++) {
           $concepto = Movimiento::where('grupo' ,'!=', $gastos[$i]['nombre'])->get();
        
           $unidad = Movimiento::where('grupo','=',$gastos[$i]['nombre'])->get();

            for ($j=0; $j < count($concepto) ; $j++) {
                for ($h=0; $h <  count($unidad) ; $h++) {
                   if ($unidad->count() && $unidad[$h]->concepto != 1) {
                       $operacion =  sprintf("%01.2f",$concepto[$j]['importe'] / $totalPropiedades);
                   }
               }

                $coeficiente = Distribucion::where('nombre','=',$concepto[$j]['grupo'])->where('propiedad_id','=',$ingreso->propiedad)->get(['coeficiente', 'nombre']);
                if(count($coeficiente) != 0 && $coeficiente[$j]->nombre == 'unidadRegistral'){
                        $coeficiente[$j]->coeficiente = 0;
                }
                
                if(count($coeficiente) != 0 && $coeficiente[$j]['coeficiente'] != 0){
                    
                    for ($e=0; $e < count($coeficiente) ; $e++) {
                        $operacion =  sprintf("%01.2f",($coeficiente[$e]['coeficiente']/100) * $concepto[$j]['importe']);
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
    
        return view('ingresos.listaMovimientos',compact('propiedad','prueba','total'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ingresos  $ingresos
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingreso $ingreso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingreso $ingreso
     * @return \Illuminate\Http\Response
     */
    public function update(IngresoRequest $request, Ingreso $ingreso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ingresos  $ingreso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingreso $ingreso)
    {
        //
    }
}
