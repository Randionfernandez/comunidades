//dd($nombre);

//distribucion_gastos::update($request->all());
// $distribucion = distribucion_gastos::where('nombre','=',$nombre)->get();
//dd($distribucion);
//$distribucion = $request->input('orden');

$input = $request->except('_token');
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
        //$distribucion = distribucion_gastos::where('nombre',$nombre)->get();
        //$distribucion = distribucion_gastos::find($request->get($nombre));
        //$distribucion -> propietario    = $input['propietario'][$i];
        $distribucion -> propiedad      = $input['propiedad'][$i];
        $distribucion -> coeficiente    = $input['coeficiente'][$i];
        $distribucion-> unidadRegistral = $input['unidadRegistral'][$i];
        $distribucion -> nombre         = $input['nombre'];
        $distribucion -> abreviatura    = $input['abreviatura'];
        $distribucion -> orden          = $input['orden'];
        $distribucion -> update();

        } else{
            return redirect()->route('distribucion.edit',$input['nombre'])->with('mensaje' ,'Revisa el coeficiente tiene sumar en total 100');
        }
    }
    
}
} else{
return redirect()->route('distribucion.edit')->with('mensaje','Tienes que selecionar alguna propiedad');
//return 'error tines que selecionar una propiedad';
//$route = 'distribucion.create';
}   
//return redirect()-> route($route);
return redirect()->route('distribucion.index')->with('mensaje','Se ha actualizado exitosamente');



//  return redirect()->route('distribucion.index')->with('Se ha actualizado exitosamente');








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