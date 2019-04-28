<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_actividad;
use App\Sfp_accion_especifica;
use App\Sfp_empresa;
use App\Sfp_proyecto;
use App\Sfp_unidad_administrativa;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ActividadRequestCrear;
use App\Http\Requests\ActividadRequestActualizar;

class Sfp_actividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $actividades=Sfp_actividad::orderBy('id_actividad')->get();
      return view('sfp_actividad_listar',compact('actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $actividades=sfp_actividad::orderBy('id_actividad')->get();
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

      return view('sfp_actividad_crear', compact('acciones','actividades'));

      /*$acciones = DB::table('sfp_acciones_especificas')
                ->join('sfp_empresas', 'sfp_acciones_especificas.id_empresa', '=', 'sfp_empresas.id_empresa')
                ->join('sfp_proyectos', 'sfp_acciones_especificas.id_empresa', '=', 'sfp_proyectos.id_empresa')
                ->join('sfp_proyectos', 'sfp_acciones_especificas.ano_presupuesto', '=', 'sfp_proyectos.ano_presupuesto')
                ->join('sfp_proyectos', 'sfp_acciones_especificas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.id_empresa', '=', 'sfp_unidades_administrativas.id_empresa')
                ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.ano_presupuesto', '=', 'sfp_unidades_administrativas.ano_presupuesto')
                ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.id_proyecto', '=', 'sfp_unidades_administrativas.id_proyecto')
                ->join('sfp_unidades_administrativas', 'sfp_acciones_especificas.id_unidad_admin', '=', 'sfp_unidades_administrativas.id_unidad_admin')
                ->select('sfp_acciones_especificas.*',
                         'sfp_empresas.nombre_empresa',
                         'sfp_proyectos.nombre_proyecto',
                         'sfp_unidades_administrativas.nombre_unidad_admin')
                ->get();
      $actividades=sfp_actividad::orderBy('id_actividad')->get();
      return view('sfp_actividad_crear', compact('acciones','actividades'));*/

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActividadRequestCrear $request)
    {
      //$id_registro = uniqid();

      $actividad=Sfp_actividad::max('id_registro');
      $actividad=$actividad+1;
      $id_registro = $actividad;

      $actividad = new Sfp_actividad();
      $actividad->id_empresa                = $request->id_empresa;
      $actividad->ano_presupuesto           = $request->ano_presupuesto;
      $actividad->id_proyecto               = $request->id_proyecto;
      $actividad->id_unidad_admin           = $request->id_unidad_admin;
      $actividad->id_accion_especifica      = $request->id_accion_especifica;
      $actividad->id_actividad              = $request->id_actividad;
      $actividad->nombre_actividad          = $request->nombre_actividad;
      $actividad->id_registro               = $id_registro;

      $actividad->save();
      return redirect('/sfp-actividades/crear')->with('status', 'La actividad ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $actividades = DB::select('select
                                	sfp_actividades.id_empresa,
                                	sfp_actividades.ano_presupuesto,
                                	sfp_actividades.id_proyecto,
                                	sfp_actividades.id_unidad_admin,
                                	sfp_actividades.id_accion_especifica,
                                	sfp_actividades.id_actividad,
                                	sfp_actividades.nombre_actividad,
                                	sfp_empresas.nombre_empresa,
                                	sfp_proyectos.nombre_proyecto,
                                	sfp_unidades_administrativas.nombre_unidad_admin,
                                  sfp_acciones_especificas.nombre_accion_especifica
                                from
                                	sfp_actividades,
                                	sfp_acciones_especificas,
                                	sfp_empresas,
                                	sfp_proyectos,
                                	sfp_unidades_administrativas
                                where
                                	sfp_actividades.id_empresa=sfp_empresas.id_empresa and
                                	sfp_actividades.id_empresa=sfp_proyectos.id_empresa and
                                	sfp_actividades.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                	sfp_actividades.id_proyecto=sfp_proyectos.id_proyecto and
                                	sfp_actividades.id_empresa=sfp_unidades_administrativas.id_empresa and
                                	sfp_actividades.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                	sfp_actividades.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                	sfp_actividades.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin and
                                  sfp_actividades.id_registro='.$id_registro);
      $actividadesMostrar = $actividades[0];
      return view('sfp_actividad_mostrar', compact('actividadesMostrar'));
      //return redirect('/sfp-actividades');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $actividades = DB::select('select
                                  sfp_actividades.id_empresa,
                                  sfp_actividades.ano_presupuesto,
                                  sfp_actividades.id_proyecto,
                                  sfp_actividades.id_unidad_admin,
                                  sfp_actividades.id_accion_especifica,
                                  sfp_actividades.id_actividad,
                                  sfp_actividades.nombre_actividad,
                                  sfp_empresas.nombre_empresa,
                                  sfp_proyectos.nombre_proyecto,
                                  sfp_unidades_administrativas.nombre_unidad_admin,
                                  sfp_acciones_especificas.nombre_accion_especifica
                                from
                                  sfp_actividades,
                                  sfp_acciones_especificas,
                                  sfp_empresas,
                                  sfp_proyectos,
                                  sfp_unidades_administrativas
                                where
                                  sfp_actividades.id_empresa=sfp_empresas.id_empresa and
                                  sfp_actividades.id_empresa=sfp_proyectos.id_empresa and
                                  sfp_actividades.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                  sfp_actividades.id_proyecto=sfp_proyectos.id_proyecto and
                                  sfp_actividades.id_empresa=sfp_unidades_administrativas.id_empresa and
                                  sfp_actividades.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                  sfp_actividades.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                  sfp_actividades.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin and
                                  sfp_actividades.id_registro='.$id_registro);
      $actividadesMostrar = $actividades[0];
      return view('sfp_actividad_editar', compact('actividadesMostrar'));
      //return redirect('/sfp-actividades');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActividadRequestActualizar $request, $id_registro)
    {
      $actividad = Sfp_actividad::where('id_registro', $id_registro)->first();
      if($actividad)
       {
           $actividad->nombre_actividad = $request->nombre_actividad;
           $actividad->save();
       }
      else
      {
          return redirect('/sfp-actividades')->with('status', 'La actividad no existe.....');
       }
      return redirect('/sfp-actividades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $actividad = Sfp_actividad::where('id_registro', $id_registro);
      $actividad->delete();
      return redirect('/sfp-actividades')->with('status', 'La actividad ha sido eliminada exitosamente');
    }
}
