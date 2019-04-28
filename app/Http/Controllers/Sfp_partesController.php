<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_parte;

use App\Http\Requests\ParteRequestCrear;
use App\Http\Requests\ParteRequestActualizar;
use Illuminate\Support\Facades\DB;
class sfp_partesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      {
        /*$partes=sfp_parte::orderBy('id_parte')->paginate(8);*/
        $partes=sfp_parte::orderBy('id_parte')->get();
        return view('sfp_parte_listar',compact('partes'));
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_parte_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParteRequestCrear $request)
    {
      //$id_registro = uniqid();

      $parte=Sfp_parte::max('id_registro');
      $parte=$parte+1;
      $id_registro = $parte;

      $parte = new Sfp_parte();
      $parte->id_parte       = $request->id_parte;
      $parte->nombre_parte   = $request->nombre_parte;
      $parte->id_registro    = $id_registro;

      $parte->save();
      return redirect('/sfp-partes/crear')->with('status', 'La parte ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $parte = Sfp_parte::where('id_registro', $id_registro)->first();
      return view('sfp_parte_mostrar', compact('parte'));
      return redirect('/sfp-partes');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $parte = Sfp_parte::where('id_registro', $id_registro)->first();
      return view('sfp_parte_editar', compact('parte'));
      return redirect('/sfp-partes')->with('status', 'La parte ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParteRequestActualizar $request, $id_registro)
    {
      $parte = Sfp_parte::where('id_registro', $id_registro)->first();
      if($parte)
      {
          $parte->nombre_parte = $request->nombre_parte;
          $parte->save();
      }
      else
      {
          return redirect('/sfp-partes')->with('status', 'La cuenta no existe.....');
      }
      return redirect('/sfp-partes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $parte = Sfp_parte::where('id_registro', $id_registro)->first();
      $parte->delete();
      return redirect('/sfp-partes')->with('status', 'La parte ha sido eliminada exitosamente');
    }
}
