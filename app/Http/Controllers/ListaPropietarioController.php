<?php

namespace App\Http\Controllers;

use App\Models\distribucion_gastos;
use App\Models\listaPropietarios;
use App\Models\Movimiento;
use Illuminate\Http\Request;

class ListaPropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      
        $grupo = request()->get('grupo');

        //$nombres = Propiedades_User::get('nombre');
          
        $distribucion = distribucion_gastos::where('nombre',$grupo)->get();
        

        $movimientos = movimientos::where('grupo', $grupo)->get('distribucion');

        //dd($movimientos);
       

        if(isset($movimientos) &&  count($movimientos) > 0 ){
            $propietarios = distribucion_gastos::where('nombre',$grupo)->get(['propiedad',$movimientos[0]['distribucion']]);
            //echo ' ' . $movimientos[0]['distribucion'];
            //echo ' ' . $propietarios[0][$movimientos[0]['distribucion']];
            //dd($propietarios);
          
        } else{
            $propietarios = distribucion_gastos::where('nombre',$grupo)->get();
            //echo $propietarios;
            //dd($propietarios);
        }
        

        //dd($propietarios);

        //echo $propietarios;

        //$totalCoeficiente = distribucion_gastos::where('nombre',$grupo)->sum('coeficiente');

        //echo $totalCoeficiente;
        

       // \Debugbar::info($propietarios);




        return view('distribucion/listaPropietarios',compact('grupo','propietarios','movimientos','nombres' ) );


        
        ///return view('distribucion/listaPropietarios',['grupo' => $grupo, 'propietarios'=> $propietarios, 'movimientos' => $movimientos ]);
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
     * @param  \App\Models\listaPropietarios  $listaPropietarios
     * @return \Illuminate\Http\Response
     */
    public function show(listaPropietarios $listaPropietarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listaPropietarios  $listaPropietarios
     * @return \Illuminate\Http\Response
     */
    public function edit(listaPropietarios $listaPropietarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listaPropietarios  $listaPropietarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listaPropietarios $listaPropietarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listaPropietarios  $listaPropietarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(listaPropietarios $listaPropietarios)
    {
        //
    }
}
