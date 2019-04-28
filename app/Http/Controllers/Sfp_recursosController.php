<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_recurso;
use App\Sfp_parte;
use App\Sfp_unidadmedida;
use App\Sfp_plancuenta;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\RecursoRequestCrear;
use App\Http\Requests\RecursoRequestActualizar;

class sfp_recursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$recursos=sfp_recurso::orderBy('id_recurso')->paginate(9);*/

      /*$recursos=sfp_recurso::orderBy('id_recurso')->get();
      return view('sfp_recurso_listar',compact('recursos'));*/

      $recursos = DB::table('sfp_recursos')
                  ->join('sfp_partes', 'sfp_recursos.id_parte', '=', 'sfp_partes.id_parte')
                  ->join('sfp_unidadmedidas', 'sfp_recursos.id_unimed', '=', 'sfp_unidadmedidas.id_unimed')
                  ->select('sfp_recursos.*', 'sfp_partes.nombre_parte', 'sfp_unidadmedidas.nombre_unidad')
                  ->get();
      return view('sfp_recurso_listar',compact('recursos'));

      /*$recursos = DB::select('select
                            	sfp_recursos.id_recurso,
                            	sfp_recursos.nombre_recurso,
                            	sfp_recursos.id_parte,
                            	sfp_partes.nombre_parte,
                            	sfp_recursos.id_unimed,
                            	sfp_unidadmedidas.nombre_unidad,
                            	sfp_recursos.precio,
                            	sfp_recursos.id_plancuenta,
                            	sfp_plancuentas.nombre_cuenta
                            from
                            	sfp_recursos,
                            	sfp_partes,
                            	sfp_unidadmedidas,
                            	sfp_plancuentas
                            where
                            	sfp_recursos.id_parte=sfp_partes.id_parte and
                            	sfp_recursos.id_unimed=sfp_unidadmedidas.id_unimed and
                            	sfp_recursos.id_plancuenta=sfp_plancuentas.id_plancuenta');
      return view('sfp_recurso_listar',compact('recursos'));*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partes=Sfp_parte::orderBy('id_parte')->get();
        $unidadmedidas=Sfp_unidadmedida::orderBy('id_unimed')->get();
        $plancuentas=Sfp_plancuenta::orderBy('id_plancuenta')->get();
        return view('sfp_recurso_crear',compact('partes','unidadmedidas','plancuentas'));
        //return view('sfp_recurso_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecursoRequestCrear $request)
    {
      //$id_registro = uniqid();

      $recurso=Sfp_recurso::max('id_registro');
      $recurso=$recurso+1;
      $id_registro = $recurso;

      $recurso = new Sfp_recurso();
      $recurso->id_recurso         = $request->id_recurso;
      $recurso->nombre_recurso     = $request->nombre_recurso;
      $recurso->id_parte           = $request->id_parte;
      $recurso->id_unimed          = $request->id_unimed;
      $recurso->precio             = $request->precio;
      $recurso->id_plancuenta      = $request->id_plancuenta;
      $recurso->id_cuentacontable  = $request->id_cuentacontable;
      $recurso->id_registro        = $id_registro;

      $recurso->save();
      return redirect('/sfp-recursos/crear')->with('status', 'El recurso ha sido ingresado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $recurso = DB::table('sfp_recursos')
                  ->join('sfp_partes', 'sfp_recursos.id_parte', '=', 'sfp_partes.id_parte')
                  ->join('sfp_unidadmedidas', 'sfp_recursos.id_unimed', '=', 'sfp_unidadmedidas.id_unimed')
                  ->join('sfp_plancuentas', 'sfp_recursos.id_plancuenta', '=', 'sfp_plancuentas.id_plancuenta')
                  ->select('sfp_recursos.*', 'sfp_partes.nombre_parte',
                           'sfp_unidadmedidas.nombre_unidad',
                           'sfp_plancuentas.nombre_cuenta')
                  ->where('sfp_recursos.id_registro', '=', $id_registro)
                  ->get();
      $recursoMostrar = $recurso[0];
      return view('sfp_recurso_mostrar',compact('recursoMostrar'));



      /*$recurso = Sfp_recurso::where('id_registro', $id_registro)->first();
      return view('sfp_recurso_mostrar', compact('recurso'));
      return redirect('/sfp-recursos');*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {

      //dd($id_registro);
      $recurso = Sfp_recurso::where('id_registro', $id_registro)->first();
      return view('sfp_recurso_editar', compact('recurso'));
      return redirect('/sfp-recursos')->with('status', 'El recurso ha sido modificado exitosamente');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecursoRequestActualizar $request, $id_registro)
    {
      $recurso = Sfp_recurso::where('id_registro', $id_registro)->first();
      if($recurso)
      {
          $recurso->nombre_recurso      = $request->nombre_recurso;
          $recurso->id_parte            = $request->id_parte;
          $recurso->id_unimed           = $request->id_unimed;
          $recurso->precio              = $request->precio;
          $recurso->id_plancuenta       = $request->id_plancuenta;
          $recurso->id_cuentacontable   = $request->id_cuentacontable;
          $recurso->save();
      }
      else
      {
          return redirect('/sfp-recursos')->with('status', 'El recurso no existe.....');
      }
      return redirect('/sfp-recursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      dd($id_registro);
      $recurso = Sfp_recurso::where('id_registro', $id_registro)->first();
      $recurso->delete();
      return redirect('/sfp-recursos')->with('status', 'El recurso ha sido eliminada exitosamente');
    }
}
