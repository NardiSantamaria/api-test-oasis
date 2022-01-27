<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\CentrosConsumo;
use App\Models\CentrosConsumoDetalles;
use App\Models\Horarios;

class getController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorias = Categorias::all(); 
        $centros_c_cancun=[];
        //$centros_consumo = CentrosConsumo::all();
        $centros_consumo_detalles = CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('centros_consumo_detalles.hotel_id', '1')->get();
        $horarios = Horarios::join('centros_consumo_detalles', 'centros_consumo_horarios.centro_consumo_id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('centros_consumo_detalles.hotel_id', '1')->get();
        //dd($horarios);
        $bares= CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('centros_consumo_detalles.hotel_id', '1')->where('categoria_id', '3')->get();
        $restaurants = CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('centros_consumo_detalles.hotel_id', '1')->where('categoria_id', '2')->get();
    
        //dd($categorias, $centros_consumo, $centros_consumo_detalles, $horarios);
        return response()->json(['categorias' => $categorias, 'detalles' => $centros_consumo_detalles, 'horarios' => $horarios, 'bares'=> $bares, 'restaurantes'=>$restaurants]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
