<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_centrocosto;

use App\Http\Requests\CentrocostoRequestCrear;
use App\Http\Requests\CentrocostoRequestActualizar;
use Illuminate\Support\Facades\DB;
class Sfp_centrocostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$centrocostos=sfp_centrocosto::orderBy('id_unidad_admin')->paginate(9);*/
      $centrocostos=sfp_centrocosto::orderBy('id_unidad_admin')->get();
      return view('sfp_centrocosto_listar',compact('centrocostos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_centrocosto_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CentrocostoRequestCrear $request)
    {

      //$id_registro = uniqid();
      $centrocosto=Sfp_centrocosto::max('id_registro');
      $centrocosto=$centrocosto+1;
      $id_registro = $centrocosto;

      $centrocosto = new Sfp_centrocosto();
      $centrocosto->id_unidad_admin     = $request->id_unidad_admin;
      $centrocosto->nombre_centrocosto  = $request->nombre_centrocosto;
      $centrocosto->id_registro         = $id_registro;
      $centrocosto -> save();
      return redirect('/sfp-centrocostos/crear')->with('status', 'El centro de costo ha sido ingresado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $centrocosto= Sfp_centrocosto::where('id_registro', $id_registro)->first();
      return view('sfp_centrocosto_mostrar', compact('centrocosto'));
      return redirect('/sfp-centrocostos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $centrocosto = Sfp_centrocosto::where('id_registro', $id_registro)->first();
      return view('sfp_centrocosto_editar', compact('centrocosto'));
      return redirect('/sfp-centrocostos')->with('status', 'El centro de costo ha sido modificado exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CentrocostoRequestActualizar $request, $id_registro)
    {
      $centrocosto = Sfp_centrocosto::where('id_registro', $id_registro)->first();
      if($centrocosto)
      {
          $centrocosto->nombre_centrocosto = $request->nombre_centrocosto;
          $centrocosto->save();
      }
      else
      {
          return redirect('/sfp-centrocostos')->with('status', 'El centro de costo no existe.....');
      }
      return redirect('/sfp-centrocostos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $centrocosto = Sfp_centrocosto::where('id_registro', $id_registro)->first();
      $centrocosto->delete();
      return redirect('/sfp-centrocostos')->with('status', 'El centro de costos ha sido eliminada exitosamente');
    }
}
