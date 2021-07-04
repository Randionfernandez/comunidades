<?php

namespace App\Http\Controllers;

use App\Models\DistribucionGasto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Propiedad;
use App\Http\Requests\DistribucionGastoRequest;

class DistribucionGastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribucion =  DistribucionGasto::orderBy('orden')->distinct('orden')->get();
       
        return view('distribuciones.index', compact('distribucion')); 


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       $propietarios = User::all();
       $propiedades = Propiedad::all();
       return view('distribuciones.create',compact('propietarios', 'propiedades'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DistribucionGastoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistribucionGastoRequest $request)
    {
        
        $input = $request->except('_token');
        $inputPropiedades = Propiedad::all();
        $nPropiedades = count($inputPropiedades);
        $suma = 0;

        foreach($input['coeficiente'] as $coeficiente){
            $suma += $coeficiente;
        }

        if(isset($input['checkbox'])){
        for($i = 0; $i < $nPropiedades; $i++ ){
            if(in_array($input['id'][$i], $input['checkbox'])){
               if($suma == 100){
                $distribucion = new DistribucionGasto();
                $distribucion->propiedad      = $input['propiedad'][$i];
                
                $distribucion->coeficiente    = $input['coeficiente'][$i];                
                $distribucion->nombre         = $input['nombre'];
                $distribucion->abreviatura    = $input['abreviatura'];
                $distribucion->orden          = $input['orden'];
                $distribucion->save();
                } else{
                    return redirect()->route('distribuciones.create')->with('mensaje' ,'Revisa el coeficiente tiene sumar en total 100');
                }
            }

        }
    } else{
        return redirect()->route('distribuciones.create')->with('mensaje','Tienes que selecionar alguna propiedad');
        
    }   
        return redirect()->route('distribuciones.index')->with('mensaje','Se ha creado satisfactoriamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function show($nombre)
    {

       $propietarios = DistribucionGasto::where('nombre', '=', $nombre)->get();  
       
       return view('distribuciones.listaPropiedades', compact('propietarios'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function edit(DistribucionGasto $distribuciongasto,$nombre)
    {
        $propietarios = DistribucionGasto::where('nombre','=',$nombre)->where('nombre','!=','unidadRegistral')->get();
        $todosPropietarios = User::all('id');
        $propiedades = Propiedad::all();

        return view('distribuciones.edit',compact('propietarios','todosPropietarios', 'propiedades'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function update(DistribucionGastoRequest $request,$nombre)
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
               $distribucion = DistribucionGasto::find($value);
               $distribucion->propiedad = $request->get('propiedad')[$key];
               $distribucion->coeficiente = $request->get('coeficiente')[$key];
               $distribucion->update();
            } else{
            return redirect()->route('distribuciones.edit',$request->nombre)->with('mensaje' ,'Revisa el coeficiente tiene sumar en total 100');
       }
       
      }
      return redirect()->route('distribuciones.index')->with('mensaje','Se ha editado satisfactoriamente');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DistribucionGasto::where('id','=',$id)->delete();
        return redirect()->route('distribuciones.index')->with('mensaje','Se ha elimino correctamente');
    }
}
