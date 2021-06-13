<?php

namespace App\Http\Controllers;

use App\Models\distribucion_gastos;
use App\Models\ingresos;
use App\Models\listaMovimientos;
use App\Models\movimientos;
use App\Models\Propiedades_User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;

class ListaMovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        
       /* 
        $propietario = 'fran';
        $grupo = movimientos::get('grupo');
        //echo $grupo;
        $concepto = movimientos::get('concepto');
        $distribucion = movimientos::get('distribucion');
        $cantidad = movimientos::get('cantidad');

        $propietarioGastos = distribucion_gastos::where('propietario',$propietario)->get('nombre');
        //dd($propietarioGastos);
        
        $selecion = distribucion_gastos::where('nombre','piscina')->get();
        dd($selecion);
        $numeroPropietarios = count($selecion) ;
        

        if($distribucion == 'coeficiente' ){
            $coeficiente = $selecion / 100;
            $operacion = $coeficiente * $cantidad;
            echo $operacion . '€ de ' . $concepto;
        } else if($distribucion == 'unidadregistral'){
            $operacion = $cantidad / $numeroPropietarios;
            echo $operacion . '€ de ' . $concepto;
            
        }
    */        


    /*
        $propietario = 'fran' ;
        //dd($propietario);
        
        $gastosPropietario = distribucion_gastos::where('propietario', $propietario)->get('nombre');
        $nuemroGastos = count($gastosPropietario);
        $distribucion =  movimientos::where('grupo', '=', $gastosPropietario)->get() ;

        for($i = 0; $i < $nuemroGastos; $i++){
            echo $gastosPropietario[$i] . '<br>';

        }
       */
      
        
        //$distribucion = movimientos::where('grupo', '=', $gastosPropietario)->get('distribucion');
        //$cantidad = movimientos::get('cantidad');
        

        /*
        $propietario = 'raul';
        $gastos = distribucion_gastos::where('propietario', '=', $propietario)->get('nombre');
        $distribucion = movimientos::where('grupo','piscina')->get('distribucion');

        echo $distribucion;
        dd($gastos);
        */


     
        





        /*

        $propiedad = request()->get('propiedad');
        $dineroPropietario = ingresos::where('propiedad','=',$propiedad)->get('cantidad');
        //echo  $propietario;
        $gastosPropietario = distribucion_gastos::where('propiedad','=',$propiedad)->get('nombre');
        $nuemroGastos = count($gastosPropietario);
        //dd($nuemroGastos);
        

        for($i = 0; $i < $nuemroGastos; $i++){
          //  echo $gastosPropietario[$i]['nombre'];
            $distribucion = movimientos::where('grupo','=',$gastosPropietario[$i]['nombre'])->get('distribucion');
            $cantidad = movimientos::where('grupo','=', $gastosPropietario[$i]['nombre'])->get('cantidad');
            
            //dd($cantidad[0]['cantidad']);
            //dd($dineroTotal);

            $concepto = movimientos::where('grupo','=',$gastosPropietario[$i]['nombre'])->get('concepto');
            
            echo ': ' .$concepto[0]['concepto'];
           // echo ': ' . $cantidad[0]['cantidad'];
           // echo ': ' . $distribucion[0]['distribucion'];
           // echo '<br>';

           // $selecion = distribucion_gastos::where('nombre',$gastosPropietario[$i]['nombre'])->get('coeficiente');
            //dd($selecion);

            $coeficientePorcentaje = distribucion_gastos::where('propiedad','=',$propiedad)->get('coeficiente');
            $numeroPropietarios = count(distribucion_gastos::where('nombre','=',$gastosPropietario[$i]['nombre'])->get()) ;

            
            if($distribucion[0]['distribucion'] == 'coeficiente' ){
                $coeficiente = $coeficientePorcentaje[0]['coeficiente'] / 100;
                $operacion = $coeficiente * $cantidad[0]['cantidad'];
                echo ': ' . $operacion . '  ' . $concepto[0]['conceto'] ;
            } else {
                $operacion = $cantidad[0]['cantidad'] / $numeroPropietarios;
                 echo ': ' . $operacion . ' ' . $concepto[0]['conceto'];
                
            }

            $dineroTotal = $dineroPropietario[0]['cantidad'] - $operacion;
        }



        for($i = 0; $i < $nuemroGastos; $i++){

            $distribucion2 = distribucion_gastos::where('propiedad', '=', $propietario)->get('nombre') ;
            $gastos2 = movimientos::where('grupo','=', $distribucion2[$i]['nombre'])->get('concepto');


            echo '  Concepto : ' . $gastos2[0]['concepto'];
        }
        
        $prueba = distribucion_gastos::join('movimientos','movimientos.grupo', '=', 'distribucion_gastos.');

       // return view('movimientos/listaMovimientos',['gastos2' =>  $gastos2[0]['concepto'], 'distribucion2' => $distribucion2 ,'propietario' => $propietario, 'nuemroGastos' => $nuemroGastos]);

        /*return view('movimientos/listaMovimientos',['propietario' => $propietario, 'operacion' => $operacion,
        'concepto' => $concepto,'dineroPropietario' => $dineroPropietario[0]['cantidad'],
        'dineroTotal' => $dineroTotal, 'conceptos' => $concepto, 'gastosPropietario' => $gastosPropietario]);
        */

/*
        $propiedad = request()->get('propiedad');
        $distribucion = distribucion_gastos::where('propiedad','=',$propiedad)->get('nombre');
        $nuemroPropiedades = Propiedades_User::count('propiedad');
        $propiedadIngresado = movimientos::where('concepto', '=', 'ingreso',)->where('propiedad','=',$propiedad )->get('cantidad');
        $gastos = movimientos::where('distribucion','=',$distribucion[0]['nombre'])->get();   
        dd($distribucion);
           

        for($i=0; $i < count($gastos); $i++){
            //echo $distribucion[$i]['nombre']. '<br>'; 
          
           // echo $gastos;   
            $porcentaje = distribucion_gastos::where('propiedad','=',$propiedad)->get('coeficiente');
           // dd($porcentaje);
              //echo $gastos;

            if($distribucion[0]['distribucion'] == 'coeficiente' ){
                $coeficiente = $porcentaje[0]['coeficiente'] / 100;
                $operacion = $coeficiente * $propiedadIngresado[$i]['cantidad'];
                //echo ': ' . $operacion  ;
            } else {
                $operacion = $propiedadIngresado[0]['cantidad'] / $nuemroPropiedades;
               //  echo ': ' . $operacion . $distribucion[$i]['nombre'];
                
            }
            
            $dineroTotal = $propiedadIngresado[0]['cantidad'] - $operacion;
            
        }
*/



/*
        $propiedad = request()->get('propiedad');
        $dineroPropiedad = movimientos::where('propiedad','=',$propiedad);

        //echo  $propietario;
        $gastosPropietario = distribucion_gastos::where('propiedad','=',$propiedad)->get();
        dd($gastosPropietario);
        $nuemroGastos = count($gastosPropietario);
        //dd($gastosPropietario);
        


        foreach($gastosPropietario as $gastos){
            //echo ":" . $gastos . '<br>';
            dd($gastos);
            $distribucion = movimientos::where('grupo','=',$gastos['concepto'],)->where('concepto', '!=', 'ingreso')->get('concepto');
            echo $distribucion;
        }






      /*  for($i = 0; $i < $nuemroGastos; $i++){
          //  echo $gastosPropietario[$i]['nombre'];
            $distribucion = movimientos::where('grupo','=',$gastosPropietario[$i]['nombre'])->get('distribucion');
            $cantidad = movimientos::where('grupo','=', $gastosPropietario[$i]['nombre'])->get('cantidad');
            
            //dd($cantidad[0]['cantidad']);
            //dd($dineroTotal);

            $concepto = movimientos::where('grupo','=',$gastosPropietario[$i]['nombre'])->get('concepto');
            
            echo ': ' .$concepto[0]['concepto'];
           // echo ': ' . $cantidad[0]['cantidad'];
           // echo ': ' . $distribucion[0]['distribucion'];
           // echo '<br>';

           // $selecion = distribucion_gastos::where('nombre',$gastosPropietario[$i]['nombre'])->get('coeficiente');
            //dd($selecion);

            $coeficientePorcentaje = distribucion_gastos::where('propiedad','=',$propiedad)->get('coeficiente');
            $numeroPropietarios = count(distribucion_gastos::where('nombre','=',$gastosPropietario[$i]['nombre'])->get()) ;

            
            if($distribucion[0]['distribucion'] == 'coeficiente' ){
                $coeficiente = $coeficientePorcentaje[0]['coeficiente'] / 100;
                $operacion = $coeficiente * $cantidad[0]['cantidad'];
                echo ': ' . $operacion . '  ' . $concepto[0]['conceto'] ;
            } else {
                $operacion = $cantidad[0]['cantidad'] / $numeroPropietarios;
                 echo ': ' . $operacion . ' ' . $concepto[0]['conceto'];
                
            }
        

           // $dineroTotal = $dineroPropiedad[0]['cantidad'] - $operacion;
        }
        */

        //$array = array();
        $prueba = array();
        $propiedad = request()->get('propiedad');
        $gastos = distribucion_gastos::where('propiedad','=',$propiedad)->get(['coeficiente','unidadRegistral','nombre']);
        $totalPropiedades = Propiedades_User::count('propiedad');
        $dineroPropiedad = movimientos::where('propiedad', '=', $propiedad)->where('concepto', '=', 'ingreso' )->get('cantidad')->sum('cantidad');
        $gastosPropiedad = 0;
        $total = 0;    
         //array_push($array,$dineroPropiedad);
         $arrayIngresado['ingresado'] = $dineroPropiedad;
        //dd($dineroIngresado);
        

        

        foreach($gastos as $gasto){
            //dd($gasto);
            //echo $gasto['nombre'] . '<br>';
           //echo $gasto['nombre'];
           dd($gasto);
            $concepto = movimientos::where('grupo' ,'=', $gasto['nombre'])->get(['concepto', 'cantidad']);
           // dd($concepto);
            //dd($concepto);
            //echo $concepto[0]['concepto'];
            //array_push($array,$concepto);

           // dd($array);
            //dd($array);
            //echo $concepto[0]['concepto'] . '<br>';

            if($gasto['nombre'] == 'coeficiente' ){
                //$coeficiente = $coeficientePorcentaje[0]['coeficiente'] / 100;
                $operacion =  sprintf("%01.2f",($gasto['coeficiente']/100) * $concepto[0]['cantidad']);
                //echo  sprintf("%01.2f",$operacion) . ' € de  ' . $concepto[0]['concepto'] . '<br>';
                
            } else {
                $operacion =  sprintf("%01.2f",$concepto[0]['cantidad'] / $totalPropiedades);
                //dd($concepto);
                //dd($operacion);
                //echo   sprintf("%01.2f",$operacion) . ' € de ' . $concepto[0]['concepto'] .'<br>';
                 

            }

            
            $restante = $dineroPropiedad - $operacion;
            $total += $dineroPropiedad - $operacion;
           // $arrayConcepto['concepto'] = $concepto[0]['concepto'];
            //$arrayOperacion['operacion'] = $operacion;
           
          /*  $prueba = [
                'ingresado' => $dineroPropiedad,
                'concepto' => $concepto[0]['concepto'],
                'operacion' => $operacion
            ];
*/             



            
           

            array_push($prueba,['ingresado' => $dineroPropiedad,
            'concepto' => $concepto[0]['concepto'],
            'operacion' => $operacion ,'restante' => $restante] );

            $dineroPropiedad -= $operacion ;
            
          //dd($prueba);
            
            //dd($arrayoperacion);
            //array_push($array,$arrayoperacion,$arrayconcepto,$dineroIngresado);
           //$array['operacion'] = $operacion;
           
           // array_push($array,$arrayIngresado,$arrayConcepto,$arrayOperacion);
          /*  $array = [
                'ingresado' => $arrayIngresado,
                'concepto' =>  $arrayConcepto,
                'total'    =>  $arrayOperacion
            ];
            */

            $gastosPropiedad += $operacion;
            //array_push($array,$gastosPropiedad);
        }
            //echo $restante;
            //dd($prueba);
            //$total = $dineroPropiedad - sprintf("%01.2f",$gastosPropiedad);
            
            //dd($total);
            //array_push($array,$total);
            //echo $total;
        
           //dd($array);
        
         
       return view('movimientos/listaMovimientos',compact('propiedad','prueba','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\listaMovimientos  $listaMovimientos
     * @return \Illuminate\Http\Response
     */
    public function show(listaMovimientos $listaMovimientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listaMovimientos  $listaMovimientos
     * @return \Illuminate\Http\Response
     */
    public function edit(listaMovimientos $listaMovimientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listaMovimientos  $listaMovimientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listaMovimientos $listaMovimientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listaMovimientos  $listaMovimientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(listaMovimientos $listaMovimientos)
    {
        //
    }
}
