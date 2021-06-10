<?php

namespace App\Http\Controllers;

use App\Models\distribucion_gastos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Propiedades_User;
use App\Http\Requests\StoreDistribucion;
use App\Models\listaDistribucion;
use App\Models\movimientos;
use Illuminate\Database\Eloquent\Collection;

class DistribucionGastosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribucion =  distribucion_gastos::orderBy('orden')->distinct('orden')->get();
       
        return view('distribucion/distribucion', compact('distribucion')); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       $propietarios = Propiedades_User::all();
       return view('distribucion/crearDistribucion',compact('propietarios'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistribucion $request)
    {
        
        $input = $request->except('_token');
        $inputPropiedades = $input['propiedad'];
        $nPropiedades = count($inputPropiedades);
        $suma = 0;

        foreach($input['coeficiente'] as $coeficiente){
            $suma += $coeficiente;
        }

        

        if(isset($input['checkbox'])){
        for($i = 0; $i < $nPropiedades; $i++ ){
            if(in_array($input['propiedad'][$i], $input['checkbox'])  ){
               if($suma == 100){
                $distribucion = new distribucion_gastos();
                $distribucion -> propiedad      = $input['propiedad'][$i];
                $distribucion -> coeficiente    = $input['coeficiente'][$i];                
                $distribucion -> nombre         = $input['nombre'];
                $distribucion -> abreviatura    = $input['abreviatura'];
                $distribucion -> orden          = $input['orden'];
                $distribucion -> save();
                } else{
                    return redirect()->route('distribucion.create')->with('mensaje' ,'Revisa el coeficiente tiene sumar en total 100');
                }
            }

        }
    } else{
        return redirect()->route('distribucion.create')->with('mensaje','Tienes que selecionar alguna propiedad');
        
    }   
        return redirect()->route('distribucion.index')->with('mensaje','Se ha creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {

       $propietarios = distribucion_gastos::where('nombre', '=', $nombre)->get();  
       
       return view('distribucion/listaPropiedades', compact('propietarios'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function edit(distribucion_gastos $distribucion_gastos,$nombre)
    {
        $propietarios = distribucion_gastos::where('nombre','=',$nombre)->where('nombre','!=','unidadRegistral')->get();
        $todosPropietarios = Propiedades_User::get();

        return view('distribucion/editarDistribucion',compact('propietarios','todosPropietarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$nombre)
    {  /* 
       $input = $request->except('_token','_method');
       $n = count($request['propiedad']);
       */
       $suma = 0;

      foreach($request->get('coeficiente') as $coeficiente){
          $suma += $coeficiente;
      }
       
      foreach($request->get('id') as $key => $value ){
            if ($suma == 100) {
               $distribucion = distribucion_gastos::find($value);
               $distribucion -> propiedad = $request->get('propiedad')[$key];
               $distribucion -> coeficiente = $request->get('coeficiente')[$key];
               $distribucion -> update();
            } else{
            return redirect()->route('distribucion.edit',$request->nombre)->with('mensaje' ,'Revisa el coeficiente tiene sumar en total 100');
       }
       
      }
      return redirect()->route('distribucion.index')->with('mensaje','Se ha editado satisfactoriamente');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function destroy($nombre)
    {
        // 
        distribucion_gastos::where('nombre','=',$nombre)->delete();
        return redirect()->route('distribucion.index')->with('mensaje','Se ha elimino correctamente');
    }
}
