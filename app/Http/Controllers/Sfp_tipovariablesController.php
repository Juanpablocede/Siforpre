<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_tipo_variable;

use App\Http\Requests\TipovariableRequestCrear;
use App\Http\Requests\TipovariableRequestActualizar;
use Illuminate\Support\Facades\DB;

class Sfp_tipovariablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$centrocostos=sfp_centrocosto::orderBy('id_unidad_admin')->paginate(9);*/
      $tipovariables=Sfp_tipo_variable::orderBy('id_tipovariable')->get();
      return view('sfp_tipovariable_listar',compact('tipovariables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_tipovariable_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TipovariableRequestCrear $request)
    {

      //$id_registro = uniqid();
      $tipovariable=Sfp_tipo_variable::max('id_registro');
      $tipovariable=$tipovariable+1;
      $id_registro = $tipovariable;

      $tipovariable = new Sfp_tipo_variable();
      $tipovariable->id_tipovariable  = $request->id_tipovariable;
      $tipovariable->nombre_variable  = $request->nombre_variable;
      $tipovariable->id_registro      = $id_registro;
      $tipovariable -> save();
      return redirect('/sfp-tipovariables/crear')->with('status', 'El tipo de variable ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $tipovariable= Sfp_tipo_variable::where('id_registro', $id_registro)->first();
      return view('sfp_tipovariable_mostrar', compact('tipovariable'));
      return redirect('/sfp-tipovariables');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $tipovariable = Sfp_tipo_variable::where('id_registro', $id_registro)->first();
      return view('sfp_tipovariable_editar', compact('tipovariable'));
      return redirect('/sfp-tipovariables')->with('status', 'El tipo de variable ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipovariableRequestActualizar $request, $id_registro)
    {
      $tipovariable = Sfp_tipo_variable::where('id_registro', $id_registro)->first();
      if($tipovariable)
      {
          $tipovariable->nombre_variable = $request->nombre_variable;
          $tipovariable->save();
      }
      else
      {
          return redirect('/sfp-tipovariables')->with('status', 'El tipo de variable no existe.....');
      }
      return redirect('/sfp-tipovariables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $tipovariable = Sfp_tipo_variable::where('id_registro', $id_registro)->first();
      $tipovariable->delete();
      return redirect('/sfp-tipovariables')->with('status', 'El tipo de variable ha sido eliminada exitosamente');
    }
}
