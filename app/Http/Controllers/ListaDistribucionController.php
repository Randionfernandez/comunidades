<?php

namespace App\Http\Controllers;

use App\Models\listaDistribucion;
use Illuminate\Http\Request;


class ListaDistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

      // return view('distribucion/listaPropietarios');
       

     
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
     * @param  \App\Models\listaDistribucion  $listaDistribucion
     * @return \Illuminate\Http\Response
     */
    public function show(listaDistribucion $listaDistribucion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\listaDistribucion  $listaDistribucion
     * @return \Illuminate\Http\Response
     */
    public function edit(listaDistribucion $listaDistribucion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\listaDistribucion  $listaDistribucion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, listaDistribucion $listaDistribucion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\listaDistribucion  $listaDistribucion
     * @return \Illuminate\Http\Response
     */
    public function destroy(listaDistribucion $listaDistribucion)
    {
        //
    }
}
