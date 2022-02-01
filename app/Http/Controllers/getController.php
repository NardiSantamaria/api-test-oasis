<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorias;
use App\Models\CentrosConsumo;
use App\Models\CentrosConsumoDetalles;
use App\Models\Horarios;
use App\Models\Hoteles;

class getController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $categorias = Categorias::all(); 
        $centros_c_cancun=[];
        $hoteles= Hoteles::all();
        //$centros_consumo = CentrosConsumo::all();
        $hotelid= $request->input('hotelid');
        $hotelid = intval($hotelid);
        $centros_consumo_detalles = CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id');
        $horarios = Horarios::join('centros_consumo_detalles', 'centros_consumo_horarios.centro_consumo_id', '=', 'centros_consumo_detalles.centro_consumo_id');
       /*  dd($horarios); */
        $bares= CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('categoria_id', '3');
        $restaurants = CentrosConsumo::join('centros_consumo_detalles', 'centros_consumo.id', '=', 'centros_consumo_detalles.centro_consumo_id')->where('categoria_id', '2');
        //dd($restaurants);
        if($hotelid > 0){
            $centros_consumo_detalles = $centros_consumo_detalles->where('hotel_id', $hotelid);
            $horarios = $horarios->where('hotel_id', $hotelid);
            $bares = $bares->where('hotel_id', $hotelid);
            $restaurants = $restaurants->where('hotel_id', $hotelid);
        }
        $horarios = $horarios->get();
        $bares = $bares->get();
        $restaurants = $restaurants->get();
        $centros_consumo_detalles=$centros_consumo_detalles->get();
        //dd($categorias, $centros_consumo, $centros_consumo_detalles, $horarios);
        return response()->json(['categorias' => $categorias, 'detalles' => $centros_consumo_detalles, 'horarios' => $horarios, 'bares'=> $bares, 'restaurantes'=>$restaurants, 'hoteles'=> $hoteles]);
    }
    public function gethorario($id_centro_consumo)
    {
        $horarios = Horarios::join('centros_consumo_detalles', 'centros_consumo_horarios.centro_consumo_id', '=', 'centros_consumo_detalles.centro_consumo_id')
        ->where('centros_consumo_detalles.hotel_id', '1')->get();
        $centro_consumo = CentrosConsumo::where('id', $id_centro_consumo)->first();
        //dd($centro_consumo);
        return response()->json(['horarios' => $horarios, 'centrosConsumo'=>$centro_consumo]);
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
