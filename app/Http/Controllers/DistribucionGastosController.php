<?php

namespace App\Http\Controllers;

use App\Models\distribucion_gastos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Propiedades_User;
use App\Http\Requests\StoreDistribucionRequest;
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
       
        

        return view('distribucion/distribucion_gastos', ['distribucion' => $distribucion]); 

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
       $unidadRegistral = null;

        if($propietarios->count()){
            $unidadRegistral = 1 / count($propietarios);
       }else{
           // Rafa Maya tiene que mejorar esta parte 
           // return 'No hay propietarios';
        }
        
       return view('distribucion/distribucion',['propietarios' => $propietarios,'unidadRegistral' => $unidadRegistral]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDistribucionRequest $request)
    {
        
        //$coeficiente = request()->get('coeficiente')->sum('coeficiente');
        //dd($coeficiente);   
        
        
        //$propietarios = Propiedades_User::all();
        //$nPropietarios = Propiedades_User::count();
        $input = $request->except('_token');
        //$Ninput = count($input);
        $inputPropiedades = $input['propiedad'];
        $nPropiedades = count($inputPropiedades);
        //$route = 'distribucion.index';
       
        $suma = 0;

        foreach($input['coeficiente'] as $coeficiente){
            $suma += $coeficiente;
        }

        

        if(isset($input['checkbox'])){
        for($i = 0; $i < $nPropiedades; $i++ ){
            if(in_array($input['propiedad'][$i], $input['checkbox'])  ){
               if($suma == 100){
                $distribucion = new distribucion_gastos();
                //$distribucion -> propietario    = $input['propietario'][$i];
                $distribucion -> propiedad      = $input['propiedad'][$i];
                $distribucion -> coeficiente    = $input['coeficiente'][$i];                
                $distribucion-> unidadRegistral = $input['unidadRegistral'][$i];
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
        //return 'error tines que selecionar una propiedad';
        //$route = 'distribucion.create';
    }   
        //return redirect()-> route($route);
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
        /*
        $nombre = distribucion_gastos::findOrFail($id);
        return $distribucion_gastos;
        //$grupo = distribucion_gastos::findOrFail($id);
        //$grupo = request()->get('grupo');
        //dd($grupo);

        $nombres = Propiedades_User::get('nombre');
        
          
        $distribucion = distribucion_gastos::where('nombre',$nombre);

        $movimientos = movimientos::where('grupo', $nombre)->get('distribucion');

       

        if(isset($movimientos) &&  count($movimientos) > 0 ){
            $propietarios = distribucion_gastos::where('nombre',$nombre)->get(['propiedad',$movimientos[0]['distribucion']]);
            //echo ' ' . $movimientos[0]['distribucion'];
            //echo ' ' . $propietarios[0][$movimientos[0]['distribucion']];
            //dd($propietarios);
          
        } else{
            $propietarios = distribucion_gastos::where('nombre',$nombre)->get();
            //echo $propietarios;
            //dd($propietarios);
        }
        

        //dd($propietarios);

        //echo $propietarios;

        //$totalCoeficiente = distribucion_gastos::where('nombre',$grupo)->sum('coeficiente');

        //echo $totalCoeficiente;
        

       // \Debugbar::info($propietarios);


      
        return view('distribucion/listaPropietarios',compact('propietarios','movimientos','nombres','nombre' ) );
        //return view('distribucion/listaPropietarios',compact('nombre'));
        */

       $grupo = distribucion_gastos::where('nombre', '=', $nombre)->get();  
       $movimientos = movimientos::where('grupo','=',$grupo[0]['nombre'])->get('distribucion');
       //dd($movimientos);

       if(isset($movimientos) &&  count($movimientos) > 0 ){
            $propietarios = distribucion_gastos::where('nombre','=', $grupo[0]['nombre'])->get(['propiedad',$movimientos[0]['distribucion']]);
            //dd( $grupo[0]['nombre']);
       } else{
            $propietarios = distribucion_gastos::where('nombre', '=', $grupo[0]['nombre'])->get();
       }
       
       return view('distribucion/listaPropietarios', compact('grupo','movimientos','propietarios'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function edit(distribucion_gastos $distribucion_gastos,$nombre)
    {
        //
        $grupo = distribucion_gastos::where('nombre', '=', $nombre)->get();  
        $movimientos = movimientos::where('grupo','=',$grupo[0]['nombre'])->get('distribucion');
        $propietarios = Propiedades_User::all();
        
        

        $propietarioLista = distribucion_gastos::where('propiedad','=',$propietarios[0]['propiedad'])->where('nombre','=', $grupo[0]['nombre'])->get();
       //dd($propietarioLista);


        if(isset($movimientos) &&  count($movimientos) > 0   ){
            //$propietarios = distribucion_gastos::where('nombre','=', $grupo[0]['nombre'])->get(['propiedad',$movimientos[0]['distribucion']]);
            $listas = distribucion_gastos::where('nombre','=', $grupo[0]['nombre'])->get(['propiedad',$movimientos[0]['distribucion']]);
            //dd($listas);
       } else{
            $listas = distribucion_gastos::where('nombre',$grupo[0]['nombre'])->get();
            //dd($listas);
       }
        
        return view('distribucion/editarDistribucion',compact('grupo','movimientos','propietarios','listas','propietarioLista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\distribucion_gastos  $distribucion_gastos
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDistribucionRequest $request,$nombre)
    {   
        //$input = $request->$request->except('_token','_method');
    
        //dd($input);
        //dd($nombre);  

        foreach($request['checkbox'] as $ld){
            $guardo = distribucion_gastos::where('propiedad','=',$ld)->where('nombre','=',$nombre)->get('id','propieadad','coeficiente','unidadRegistral');
           //echo $guardo . '<br>' .'<br>';
            //dd($guardo);
           // echo $guardo .'<br>' .'<br>';
            $input = $request->except('_token','_method');        
            
            /*
            $data = [
                'propiedad' =>   $request->propiedad,
                'coeficiente' => $request->coeficiente,
                'unidadRegistral' => $request->unidadRegistral
            ];
            */
           // dd($data);

            //$guardo::update($data);
            
            
            $distribucion = distribucion_gastos::findOrFail($guardo);
            //echo $distribucion[0]['propiedad'];
            $distribucion->propiedad = $request->propiedad;
            $distribucion->coeficiente = $request->coeficiente;
            $distribucion->unidadRegistral = $request->unidadRegistral;
            $distribucion->save();






            //$guardo[0]['propiedad'] = $input['propiedad'];
            //$guardo[0]['coeficiente']  = $input['coeficiente'];
            //$guardo[0]['unidadRegistral']  = $input['unidadRegistral'];
            //dd($guardo);
            //$guardo->update();
            //distribucion_gastos::updated([$guardo[0]['propiedad'],$guardo[0]['coeficiente'],$guardo[0]['unidadRegistral']]);


        }
        
            
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
