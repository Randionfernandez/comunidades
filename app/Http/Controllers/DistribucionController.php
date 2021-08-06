<?php

namespace App\Http\Controllers;

use App\Models\Distribucion;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Propiedad;
use App\Http\Requests\DistribucionRequest;

class DistribucionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $distribuciones = Distribucion::orderBy('orden')->distinct('orden')->get();
        $propiedades = session()->get('cmd_seleccionada')->propiedades()->get();

        return view('distribuciones.index', compact('distribuciones', 'propiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $propiedades = session()->get('cmd_seleccionada')->propiedades()->get();
        $btnText1 = 'Save';
        $btnText2 = 'Back';
        $btndisabled = '';

        return view('distribuciones.create', [
            'distribucion' => new Distribucion,
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
     * @param  \Illuminate\Http\DistribucionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistribucionRequest $request) {

        $input = $request->except('_token');
        $inputPropiedades = session()->get('cmd_seleccionada')->propiedades()->get();
        $nPropiedades = count($inputPropiedades);
        $suma = 0;

        foreach ($input['coeficiente'] as $coeficiente) {
            $suma += $coeficiente;
        }

        if (isset($input['checkbox'])) {
            for ($i = 0; $i < $nPropiedades; $i++) {
                if (in_array($input['id'][$i], $input['checkbox'])) {
                    if ($suma == 100) {
                        $distribucion = new Distribucion();
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
     * @param  \App\Models\Distribucion  $distribucion
     * @return \Illuminate\Http\Response
     */
    public function show($name) {

        $propietarios = Distribucion::where('name', '=', $name)->get();

        return view('distribuciones.listaPropiedades', compact('propietarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribucion  $distribucion
     * @return \Illuminate\Http\Response
     */
    public function edit(Distribucion $distribucion) {
        
        $distribucion = Distribucion::where('name', '=', $distribucion->name)->where('name', '!=', 'unidadRegistral')->get()->last();
        $propietarios = User::all('id');
        $propiedades = session()->get('cmd_seleccionada')->propiedades()->get();
        
        return view('distribuciones.edit', [
            'distribucion' => $distribucion,
            'distribucion' => $distribucion,
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
     * @param  \App\Models\Distribucion  $distribucion
     * @return \Illuminate\Http\Response
     */
    public function update(Distribucion $distribucion ,DistribucionRequest $request) { /*
      $input = $request->except('_token','_method');
      $n = count($request['propiedad']);
     */
        $suma = 0;

        foreach ($request->get('coeficiente') as $coeficiente) {
            $suma += $coeficiente;
        }


        foreach ($request->get('id') as $key => $value) {
            if ($suma == 100) {
                $distribucion = Distribucion::find($value);
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
     * @param  \App\Models\Distribucion  $distribucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribucion $distribucion) {
        //
        $distribucion->delete();
        return redirect()->route('distribuciones.index')->with('mensaje', 'Se ha elimino correctamente');
    }

}
