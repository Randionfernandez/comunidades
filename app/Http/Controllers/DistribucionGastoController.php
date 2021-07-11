<?php

namespace App\Http\Controllers;

use App\Models\DistribucionGasto;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Propiedad;
use App\Http\Requests\DistribucionGastoRequest;

class DistribucionGastoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $distribuciones = DistribucionGasto::orderBy('orden')->distinct('orden')->get();

        return view('distribuciones.index', compact('distribuciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $propiedades = session()->get('activeCommunity')->propiedades()->get();
        $btnText1 = 'Save';
        $btnText2 = 'Back';
        $btndisabled = '';

        return view('distribuciones.create', [
            'distribucionGasto' => new DistribucionGasto,
            'propiedades' => $propiedades,
            'btnText1' => $btnText1,
            'btnText2' => $btnText2,
            'btndisabled' => $btndisabled,
            'title' => 'Create Distribucion',
            'coeficiente_if' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\DistribucionGastoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistribucionGastoRequest $request) {

        $input = $request->except('_token');
        $inputPropiedades = session()->get('activeCommunity')->propiedades()->get();
        $nPropiedades = count($inputPropiedades);
        $suma = 0;

        foreach ($input['coeficiente'] as $coeficiente) {
            $suma += $coeficiente;
        }

        if (isset($input['checkbox'])) {
            for ($i = 0; $i < $nPropiedades; $i++) {
                if (in_array($input['id'][$i], $input['checkbox'])) {
                    if ($suma == 100) {
                        $distribucion = new DistribucionGasto();
                        $distribucion->propiedad_id = $input['propiedad'][$i];
                        $distribucion->coeficiente = $input['coeficiente'][$i];
                        $distribucion->name = $input['name'];
                        $distribucion->abreviatura = $input['abreviatura'];
                        $distribucion->orden = $input['orden'];
                        $distribucion->save();
                    } else {
                        return redirect()->route('distribuciones.create')->with('mensaje', 'Revisa el coeficiente, tiene sumar en total 100');
                    }
                }
            }
        } else {
            return redirect()->route('distribuciones.create')->with('mensaje', 'Tienes que selecionar alguna propiedad');
        }
        return redirect()->route('distribuciones.index')->with('mensaje', 'Se ha creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function show($name) {

        $propietarios = DistribucionGasto::where('name', '=', $name)->get();

        return view('distribuciones.listaPropiedades', compact('propietarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function edit(DistribucionGasto $distribuciongasto, $name) {
        
        $distribucion = DistribucionGasto::where('name', '=', $name)->where('name', '!=', 'unidadRegistral')->get()->last();
        $propietarios = User::all('id');
        $propiedades = session()->get('activeCommunity')->propiedades()->get();
        
        return view('distribuciones.edit', [
            'distribucion' => $distribucion,
            'distribucionGasto' => $distribuciongasto,
            'todosPropietarios' => $propietarios,
            'propiedades' => $propiedades,
            'btnText1' => 'Update',
            'btnText2' => 'Cancel',
            'btndisabled' => '',
            'title' => 'Editar Distribucion',
            'coeficiente_if' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function update(DistribucionGasto $distribucionGasto ,DistribucionGastoRequest $request) { /*
      $input = $request->except('_token','_method');
      $n = count($request['propiedad']);
     */
        dd($request->get());
        $suma = 0;

        foreach ($request->get('coeficiente') as $coeficiente) {
            $suma += $coeficiente;
        }


        foreach ($request->get('id') as $key => $value) {
            if ($suma == 100) {
                $distribucion = DistribucionGasto::find($value);
                $distribucion->propiedad = $request->get('propiedad')[$key];
                $distribucion->coeficiente = $request->get('coeficiente')[$key];
                $distribucion->update();
            } else {
                return redirect()->route('distribuciones.edit', $request->name)->with('mensaje', 'Revisa el coeficiente tiene sumar en total 100');
            }
        }
        return redirect()->route('distribuciones.index')->with('mensaje', 'Se ha editado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DistribucionGasto  $distribuciongasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(DistribucionGasto $distribucion) {
        //
        $distribucion->delete();
        return redirect()->route('distribuciones.index')->with('mensaje', 'Se ha elimino correctamente');
    }

}
