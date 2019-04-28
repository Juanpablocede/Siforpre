<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_unidadmedida;

use App\Http\Requests\UnidadmedidaRequestCrear;
use App\Http\Requests\UnidadmedidaRequestActualizar;
use Illuminate\Support\Facades\DB;
class sfp_unidadmedidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$unidadmedidas=sfp_unidadmedida::orderBy('id_unimed')->paginate(8);*/
      $unidadmedidas=sfp_unidadmedida::orderBy('id_unimed')->get();
      return view('sfp_unidadmedida_listar',compact('unidadmedidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_unidadmedida_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadmedidaRequestCrear $request)
    {
      //$id_registro = uniqid();

      $unidadmedida=Sfp_unidadmedida::max('id_registro');
      $unidadmedida=$unidadmedida+1;
      $id_registro = $unidadmedida;

      $unidadmedida = new Sfp_unidadmedida();
      $unidadmedida->id_unimed       = $request->id_unimed;
      $unidadmedida->nombre_unidad   = $request->nombre_unidad;
      $unidadmedida->id_registro     = $id_registro;

      $unidadmedida->save();
      return redirect('/sfp-unidadmedidas/crear')->with('status', 'La unidad de medida ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $unidadmedida = Sfp_unidadmedida::where('id_registro', $id_registro)->first();
      return view('sfp_unidadmedida_mostrar', compact('unidadmedida'));
      return redirect('/sfp-unidadmedidas ');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $unidadmedida = Sfp_unidadmedida::where('id_registro', $id_registro)->first();
      return view('sfp_unidadmedida_editar', compact('unidadmedida'));
      return redirect('/sfp-unidadmedidas')->with('status', 'La unidad de medida ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadmedidaRequestActualizar $request, $id_registro)
    {
      $unidadmedida = Sfp_unidadmedida::where('id_registro', $id_registro)->first();
      if($unidadmedida)
      {
          $unidadmedida->nombre_unidad = $request->nombre_unidad;
          $unidadmedida->save();
      }
      else
      {
          return redirect('/sfp-unidadmedidas')->with('status', 'La unidad medida no existe.....');
      }
      return redirect('/sfp-unidadmedidas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $unidadmedida = Sfp_unidadmedida::where('id_registro',$id_registro)->first();
      $unidadmedida->delete();
      return redirect('/sfp-unidadmedidas')->with('status', 'La unidad medida ha sido eliminada exitosamente');
    }
}
