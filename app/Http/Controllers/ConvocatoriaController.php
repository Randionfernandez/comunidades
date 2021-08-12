<?php

namespace App\Http\Controllers;

// emailspace App\Http\Controllers;

use App\Models\Convocatoria;
use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\Http\ConvocatoriaRequest;

class ConvocatoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

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
      DB::table('convocatorias')->insert([
        'email'=>$request->email,
        'primera_conv'=>$request->primera_conv,
        'segunda_conv'=>$request->segunda_conv,
        'convocatoria_email'=>$request->convocatoria_email,
        'orden_dia'=>$request->orden_dia,
        ]);
      return redirect('/convocatoria')->with('success', 'Convocatoria agregada');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function show(Convocatoria $convocatoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocatoria $convocatoria)
    {
         $convocatoria=Convocatoria::findOrFail($id);
        return view('convocatoria.edit')->with('convocatoria',$convocatoria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convocatoria $convocatoria)
    {
         $concovatoria=Concovatoria::findOrFail($id);
        $concovatoria->email=$request->get('email');
        $concovatoria->primera_conv=$request->get('primera_conv');
        $concovatoria->primera_conv=$request->get('primera_conv');
        $concovatoria->convocatoria_email=$request->get('convocatoria_email');
        $concovatoria->orden_dia=$request->get('orden_dia');
        $convocatoria->save();

        return redirect('/convocatoria')->with('success', 'Configuración actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convocatoria  $convocatoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocatoria $convocatoria)
    {
         $convocatoria=Convocatoria::findOrFail($id);
        $convocatoria->delete();
        return redirect('/convocatoria')->with('success', 'Convocatoria eliminada');
    }
}
