<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_accion_especifica;
/*use App\Sfp_empresa;
use App\Sfp_proyecto;
use App\Sfp_unidad_administrativa;*/

use Illuminate\Support\Facades\DB;
use App\Http\Requests\AccionespecificaRequestCrear;
use App\Http\Requests\AccionespecificaRequestActualizar;

class Sfp_acciones_especificasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accionesespecificas=Sfp_accion_especifica::orderBy('id_accion_especifica')->get();
        return view('sfp_accionespecifica_listar',compact('accionesespecificas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = DB::table('sfp_unidades_administrativas')
                  ->join('sfp_empresas', 'sfp_unidades_administrativas.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->join('sfp_proyectos', 'sfp_unidades_administrativas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                  ->select('sfp_unidades_administrativas.*',
                           'sfp_empresas.nombre_empresa',
                           'sfp_proyectos.nombre_proyecto')
                  ->get();
        $accionespecifica=sfp_accion_especifica::orderBy('id_accion_especifica')->get();
        return view('sfp_accionespecifica_crear', compact('unidades','accionespecifica'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccionespecificaRequestCrear $request)
    {
        //$id_registro = uniqid();

        $accionespecifica=Sfp_accion_especifica::max('id_registro');
        $accionespecifica=$accionespecifica+1;
        $id_registro = $accionespecifica;

        $accionespecifica = new Sfp_accion_especifica();
        $accionespecifica->id_empresa                = $request->id_empresa;
        $accionespecifica->ano_presupuesto           = $request->ano_presupuesto;
        $accionespecifica->id_proyecto               = $request->id_proyecto;
        $accionespecifica->id_unidad_admin           = $request->id_unidad_admin;
        $accionespecifica->id_accion_especifica      = $request->id_accion_especifica;
        $accionespecifica->nombre_accion_especifica  = $request->nombre_accion_especifica;
        $accionespecifica->id_registro               = $id_registro;

        $accionespecifica->save();
        return redirect('/sfp-accionespecificas/crear')->with('status', 'La acción especifica ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
        $accionespecifica = DB::table('sfp_acciones_especificas')
                  ->join('sfp_empresas', 'sfp_acciones_especificas.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->join('sfp_proyectos', 'sfp_acciones_especificas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                  ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.id_unidad_admin', '=', 'sfp_unidades_administrativas.id_unidad_admin')
                  ->select('sfp_acciones_especificas.*',
                           'sfp_empresas.nombre_empresa',
                           'sfp_proyectos.nombre_proyecto',
                           'sfp_unidades_administrativas.nombre_unidad_admin')
                  ->where('sfp_acciones_especificas.id_registro', '=', $id_registro)
                  ->get();
        $accionesMostrar = $accionespecifica[0];
        return view('sfp_accionespecifica_mostrar', compact('accionesMostrar'));
        return redirect('/sfp-accionespecificas');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
        $accionespecifica = DB::table('sfp_acciones_especificas')
                  ->join('sfp_empresas', 'sfp_acciones_especificas.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->join('sfp_proyectos', 'sfp_acciones_especificas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                  ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.id_unidad_admin', '=', 'sfp_unidades_administrativas.id_unidad_admin')
                  ->select('sfp_acciones_especificas.*',
                           'sfp_empresas.nombre_empresa',
                           'sfp_proyectos.nombre_proyecto',
                           'sfp_unidades_administrativas.nombre_unidad_admin')
                  ->where('sfp_acciones_especificas.id_registro', '=', $id_registro)
                  ->get();
        $accionesMostrar = $accionespecifica[0];
        return view('sfp_accionespecifica_editar', compact('accionesMostrar'));
        return redirect('/sfp-accionespecificas');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccionespecificaRequestActualizar $request, $id_registro)
    {
        $accionespecifica = Sfp_accion_especifica::where('id_registro', $id_registro)->first();
        if($accionespecifica)
         {
             $accionespecifica->nombre_accion_especifica = $request->nombre_accion_especifica;
             $accionespecifica->save();
         }
        else
        {
            return redirect('/sfp-accionespecificas')->with('status', 'La accion especifica no existe.....');
         }
        return redirect('/sfp-accionespecificas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
        $accionespecifica = Sfp_accion_especifica::where('id_registro', $id_registro);
        $accionespecifica->delete();
        return redirect('/sfp-accionespecificas')->with('status', 'La accion especifica ha sido eliminada exitosamente');
    }

    public function search()
    {

      $acciones = DB::select('select
                                sfp_acciones_especificas.id_empresa,
                                sfp_acciones_especificas.ano_presupuesto,
                                sfp_acciones_especificas.id_proyecto,
                                sfp_acciones_especificas.id_unidad_admin,
                                sfp_acciones_especificas.id_accion_especifica,
                                sfp_acciones_especificas.nombre_accion_especifica,
                                sfp_empresas.nombre_empresa,
                                sfp_proyectos.nombre_proyecto,
                                sfp_unidades_administrativas.nombre_unidad_admin
                              from
                                sfp_acciones_especificas,
                                sfp_empresas,
                                sfp_proyectos,
                                sfp_unidades_administrativas
                              where
                                sfp_acciones_especificas.id_empresa=sfp_empresas.id_empresa and
                                sfp_acciones_especificas.id_empresa=sfp_proyectos.id_empresa and
                                sfp_acciones_especificas.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                sfp_acciones_especificas.id_proyecto=sfp_proyectos.id_proyecto and
                                sfp_acciones_especificas.id_empresa=sfp_unidades_administrativas.id_empresa and
                                sfp_acciones_especificas.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                sfp_acciones_especificas.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                sfp_acciones_especificas.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin');

      return  response()->json($acciones);
    }
}
