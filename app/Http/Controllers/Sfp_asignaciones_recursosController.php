<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_asignacion_recurso;
use App\Sfp_recurso;
use App\Sfp_plancuenta;
use App\Sfp_fuente_financiamiento;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\AsignacionrecursoRequestCrear;
use App\Http\Requests\AsignacionrecursoRequestActualizar;

class Sfp_asignaciones_recursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $asignacionrecursos=Sfp_asignacion_recurso::orderBy('id_empresa',
                                                          'ano_presupuesto',
                                                          'id_proyecto',
                                                          'id_unidad_admin',
                                                          'id_accion_especifica',
                                                          'id_actividad')->get();
      return view('sfp_asignacionrecurso_listar',compact('asignacionrecursos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $asignacionrecursos=sfp_asignacion_recurso::orderBy('id_empresa',
                                                          'ano_presupuesto',
                                                          'id_proyecto',
                                                          'id_unidad_admin',
                                                          'id_accion_especifica',
                                                          'id_actividad')->get();
      $recursos=Sfp_recurso::orderBy('id_recurso')->get();
      $plancuentas=Sfp_plancuenta::orderBy('id_plancuenta')->get();
      $fuentefinanciamientos=Sfp_fuente_financiamiento::orderBy('id_registro')->get();
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
                                    sfp_proyectos.tipo,
                                  	sfp_unidades_administrativas.nombre_unidad_admin,
                                  	sfp_acciones_especificas.nombre_accion_especifica
                                  from
                                  	sfp_actividades,
                                  	sfp_empresas,
                                  	sfp_proyectos,
                                  	sfp_unidades_administrativas,
                                  	sfp_acciones_especificas
                                  where
                                  	sfp_actividades.id_empresa=sfp_empresas.id_empresa and
                                  	sfp_actividades.id_empresa=sfp_proyectos.id_empresa and
                                  	sfp_actividades.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                  	sfp_actividades.id_proyecto=sfp_proyectos.id_proyecto and
                                  	sfp_actividades.id_empresa=sfp_unidades_administrativas.id_empresa and
                                  	sfp_actividades.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                  	sfp_actividades.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                  	sfp_actividades.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin and
                                  	sfp_actividades.id_empresa=sfp_acciones_especificas.id_empresa and
                                  	sfp_actividades.ano_presupuesto=sfp_acciones_especificas.ano_presupuesto and
                                  	sfp_actividades.id_proyecto=sfp_acciones_especificas.id_proyecto and
                                  	sfp_actividades.id_unidad_admin=sfp_acciones_especificas.id_unidad_admin
                                  order by
                                    sfp_actividades.id_empresa,
                                  	sfp_actividades.ano_presupuesto,
                                  	sfp_actividades.id_proyecto,
                                  	sfp_actividades.id_unidad_admin,
                                  	sfp_actividades.id_accion_especifica,
                                  	sfp_actividades.id_actividad,
                                  	sfp_actividades.nombre_actividad');

      return view('sfp_asignacionrecurso_crear', compact('asignacionrecursos','actividades','recursos','plancuentas','fuentefinanciamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignacionrecursoRequestCrear $request)
    {
      //$id_registro = uniqid();

      $asignacionrecurso=sfp_asignacion_recurso::max('id_registro');
      $asignacionrecurso=$asignacionrecurso+1;
      $id_registro = $asignacionrecurso;

      $asignacionrecurso = new sfp_asignacion_recurso();
      $asignacionrecurso->id_empresa                = $request->id_empresa;
      $asignacionrecurso->ano_presupuesto           = $request->ano_presupuesto;
      $asignacionrecurso->id_proyecto               = $request->id_proyecto;
      $asignacionrecurso->id_unidad_admin           = $request->id_unidad_admin;
      $asignacionrecurso->id_accion_especifica      = $request->id_accion_especifica;
      $asignacionrecurso->id_actividad              = $request->id_actividad;
      $asignacionrecurso->id_fuente_financiamiento  = $request->id_fuente_financiamiento;
      $asignacionrecurso->tipo                      = $request->tipo;
      $asignacionrecurso->id_recurso                = $request->id_recurso;
      $asignacionrecurso->precio_recurso            = $request->precio_recurso;
      $asignacionrecurso->id_plancuenta             = $request->id_plancuenta;
      $asignacionrecurso->escenario                 = $request->escenario;
      $asignacionrecurso->cantidad_enero            = $request->cantidad_enero;
      $asignacionrecurso->cantidad_febrero          = $request->cantidad_febrero;
      $asignacionrecurso->cantidad_marzo            = $request->cantidad_marzo;
      $asignacionrecurso->cantidad_abril            = $request->cantidad_abril;
      $asignacionrecurso->cantidad_mayo             = $request->cantidad_mayo;
      $asignacionrecurso->cantidad_junio            = $request->cantidad_junio;
      $asignacionrecurso->cantidad_julio            = $request->cantidad_julio;
      $asignacionrecurso->cantidad_agosto           = $request->cantidad_agosto;
      $asignacionrecurso->cantidad_septiembre       = $request->cantidad_septiembre;
      $asignacionrecurso->cantidad_octubre          = $request->cantidad_octubre;
      $asignacionrecurso->cantidad_noviembre        = $request->cantidad_noviembre;
      $asignacionrecurso->cantidad_diciembre        = $request->cantidad_diciembre;
      $asignacionrecurso->monto_enero               = $request->cantidad_enero*$request->precio_recurso;
      $asignacionrecurso->monto_febrero             = $request->cantidad_febrero*$request->precio_recurso;
      $asignacionrecurso->monto_marzo               = $request->cantidad_marzo*$request->precio_recurso;
      $asignacionrecurso->monto_abril               = $request->cantidad_abril*$request->precio_recurso;
      $asignacionrecurso->monto_mayo                = $request->cantidad_mayo*$request->precio_recurso;
      $asignacionrecurso->monto_junio               = $request->cantidad_junio*$request->precio_recurso;
      $asignacionrecurso->monto_julio               = $request->cantidad_julio*$request->precio_recurso;
      $asignacionrecurso->monto_agosto              = $request->cantidad_agosto*$request->precio_recurso;
      $asignacionrecurso->monto_septiembre          = $request->cantidad_septiembre*$request->precio_recurso;
      $asignacionrecurso->monto_octubre             = $request->cantidad_octubre*$request->precio_recurso;
      $asignacionrecurso->monto_noviembre           = $request->cantidad_noviembre*$request->precio_recurso;
      $asignacionrecurso->monto_diciembre           = $request->cantidad_diciembre*$request->precio_recurso;
      $asignacionrecurso->id_registro               = $id_registro;

      $asignacionrecurso->save();
      return redirect('/sfp-asignacionrecursos/crear')->with('status', 'La asignación de recursos ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $asignacionrecurso = DB::select('select
                                         	sfp_asignaciones_recursos.id_empresa,
                                        	sfp_asignaciones_recursos.ano_presupuesto,
                                        	sfp_asignaciones_recursos.id_proyecto,
                                        	sfp_asignaciones_recursos.id_unidad_admin,
                                        	sfp_asignaciones_recursos.id_accion_especifica,
                                        	sfp_asignaciones_recursos.id_actividad,
                                        	sfp_asignaciones_recursos.id_fuente_financiamiento,
                                        	sfp_asignaciones_recursos.tipo,
                                        	sfp_asignaciones_recursos.id_recurso,
                                        	sfp_asignaciones_recursos.precio_recurso,
                                        	sfp_asignaciones_recursos.id_plancuenta,
                                        	sfp_asignaciones_recursos.escenario,
                                        	sfp_asignaciones_recursos.cantidad_enero,
                                        	sfp_asignaciones_recursos.monto_enero,
                                        	sfp_asignaciones_recursos.cantidad_febrero,
                                          sfp_asignaciones_recursos.monto_febrero,
                                          sfp_asignaciones_recursos.cantidad_marzo,
                                        	sfp_asignaciones_recursos.monto_marzo,
                                        	sfp_asignaciones_recursos.cantidad_abril,
                                        	sfp_asignaciones_recursos.monto_abril,
                                        	sfp_asignaciones_recursos.cantidad_mayo,
                                        	sfp_asignaciones_recursos.monto_mayo,
                                        	sfp_asignaciones_recursos.cantidad_junio,
                                        	sfp_asignaciones_recursos.monto_junio,
                                        	sfp_asignaciones_recursos.cantidad_julio,
                                        	sfp_asignaciones_recursos.monto_julio,
                                        	sfp_asignaciones_recursos.cantidad_agosto,
                                        	sfp_asignaciones_recursos.monto_agosto,
                                        	sfp_asignaciones_recursos.cantidad_septiembre,
                                        	sfp_asignaciones_recursos.monto_septiembre,
                                        	sfp_asignaciones_recursos.cantidad_octubre,
                                        	sfp_asignaciones_recursos.monto_octubre,
                                        	sfp_asignaciones_recursos.cantidad_noviembre,
                                        	sfp_asignaciones_recursos.monto_noviembre,
                                        	sfp_asignaciones_recursos.cantidad_diciembre,
                                        	sfp_asignaciones_recursos.monto_diciembre,
                                        	sfp_empresas.nombre_empresa,
                                        	sfp_proyectos.nombre_proyecto,
                                        	sfp_unidades_administrativas.nombre_unidad_admin,
                                        	sfp_acciones_especificas.nombre_accion_especifica,
                                        	sfp_actividades.nombre_actividad,
                                        	sfp_fuentes_financiamientos.nombre_fuente_financiamiento,
                                        	sfp_recursos.nombre_recurso,
                                        	sfp_plancuentas.nombre_cuenta
                                      from
                                        	sfp_asignaciones_recursos,
                                        	sfp_empresas,
                                        	sfp_proyectos,
                                        	sfp_unidades_administrativas,
                                        	sfp_acciones_especificas,
                                        	sfp_actividades,
                                        	sfp_fuentes_financiamientos,
                                        	sfp_recursos,
                                        	sfp_plancuentas
                                      where
                                        	sfp_asignaciones_recursos.id_empresa=sfp_empresas.id_empresa and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_proyectos.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_proyectos.id_proyecto and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_unidades_administrativas.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_acciones_especificas.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_acciones_especificas.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_acciones_especificas.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_acciones_especificas.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_accion_especifica=sfp_acciones_especificas.id_accion_especifica and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_actividades.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_actividades.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_actividades.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_actividades.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_accion_especifica=sfp_actividades.id_accion_especifica and
                                        	sfp_asignaciones_recursos.id_actividad=sfp_actividades.id_actividad and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_fuentes_financiamientos.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_fuentes_financiamientos.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_fuente_financiamiento=sfp_fuentes_financiamientos.id_fuente_financiamiento and
                                        	sfp_asignaciones_recursos.id_recurso=sfp_recursos.id_recurso and
                                        	sfp_asignaciones_recursos.id_plancuenta=sfp_plancuentas.id_plancuenta and
                                          sfp_asignaciones_recursos.id_registro='.$id_registro);
      $recursosMostrar = $asignacionrecurso[0];
      return view('sfp_asignacionrecurso_mostrar', compact('recursosMostrar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $recursos=sfp_recurso::orderBy('id_recurso')->get();
      $plancuentas=sfp_plancuenta::orderBy('id_plancuenta')->get();
      $asignacionrecurso = DB::select('select
                                         	sfp_asignaciones_recursos.id_empresa,
                                        	sfp_asignaciones_recursos.ano_presupuesto,
                                        	sfp_asignaciones_recursos.id_proyecto,
                                        	sfp_asignaciones_recursos.id_unidad_admin,
                                        	sfp_asignaciones_recursos.id_accion_especifica,
                                        	sfp_asignaciones_recursos.id_actividad,
                                        	sfp_asignaciones_recursos.id_fuente_financiamiento,
                                        	sfp_asignaciones_recursos.tipo,
                                        	sfp_asignaciones_recursos.id_recurso,
                                        	sfp_asignaciones_recursos.precio_recurso,
                                        	sfp_asignaciones_recursos.id_plancuenta,
                                        	sfp_asignaciones_recursos.escenario,
                                        	sfp_asignaciones_recursos.cantidad_enero,
                                        	sfp_asignaciones_recursos.monto_enero,
                                        	sfp_asignaciones_recursos.cantidad_febrero,
                                          sfp_asignaciones_recursos.monto_febrero,
                                          sfp_asignaciones_recursos.cantidad_marzo,
                                        	sfp_asignaciones_recursos.monto_marzo,
                                        	sfp_asignaciones_recursos.cantidad_abril,
                                        	sfp_asignaciones_recursos.monto_abril,
                                        	sfp_asignaciones_recursos.cantidad_mayo,
                                        	sfp_asignaciones_recursos.monto_mayo,
                                        	sfp_asignaciones_recursos.cantidad_junio,
                                        	sfp_asignaciones_recursos.monto_junio,
                                        	sfp_asignaciones_recursos.cantidad_julio,
                                        	sfp_asignaciones_recursos.monto_julio,
                                        	sfp_asignaciones_recursos.cantidad_agosto,
                                        	sfp_asignaciones_recursos.monto_agosto,
                                        	sfp_asignaciones_recursos.cantidad_septiembre,
                                        	sfp_asignaciones_recursos.monto_septiembre,
                                        	sfp_asignaciones_recursos.cantidad_octubre,
                                        	sfp_asignaciones_recursos.monto_octubre,
                                        	sfp_asignaciones_recursos.cantidad_noviembre,
                                        	sfp_asignaciones_recursos.monto_noviembre,
                                        	sfp_asignaciones_recursos.cantidad_diciembre,
                                        	sfp_asignaciones_recursos.monto_diciembre,
                                        	sfp_empresas.nombre_empresa,
                                        	sfp_proyectos.nombre_proyecto,
                                        	sfp_unidades_administrativas.nombre_unidad_admin,
                                        	sfp_acciones_especificas.nombre_accion_especifica,
                                        	sfp_actividades.nombre_actividad,
                                        	sfp_fuentes_financiamientos.nombre_fuente_financiamiento,
                                        	sfp_recursos.nombre_recurso,
                                        	sfp_plancuentas.nombre_cuenta
                                      from
                                        	sfp_asignaciones_recursos,
                                        	sfp_empresas,
                                        	sfp_proyectos,
                                        	sfp_unidades_administrativas,
                                        	sfp_acciones_especificas,
                                        	sfp_actividades,
                                        	sfp_fuentes_financiamientos,
                                        	sfp_recursos,
                                        	sfp_plancuentas
                                      where
                                        	sfp_asignaciones_recursos.id_empresa=sfp_empresas.id_empresa and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_proyectos.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_proyectos.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_proyectos.id_proyecto and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_unidades_administrativas.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_unidades_administrativas.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_unidades_administrativas.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_unidades_administrativas.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_acciones_especificas.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_acciones_especificas.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_acciones_especificas.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_acciones_especificas.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_accion_especifica=sfp_acciones_especificas.id_accion_especifica and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_actividades.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_actividades.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_proyecto=sfp_actividades.id_proyecto and
                                        	sfp_asignaciones_recursos.id_unidad_admin=sfp_actividades.id_unidad_admin and
                                        	sfp_asignaciones_recursos.id_accion_especifica=sfp_actividades.id_accion_especifica and
                                        	sfp_asignaciones_recursos.id_actividad=sfp_actividades.id_actividad and
                                        	sfp_asignaciones_recursos.id_empresa=sfp_fuentes_financiamientos.id_empresa and
                                        	sfp_asignaciones_recursos.ano_presupuesto=sfp_fuentes_financiamientos.ano_presupuesto and
                                        	sfp_asignaciones_recursos.id_fuente_financiamiento=sfp_fuentes_financiamientos.id_fuente_financiamiento and
                                        	sfp_asignaciones_recursos.id_recurso=sfp_recursos.id_recurso and
                                        	sfp_asignaciones_recursos.id_plancuenta=sfp_plancuentas.id_plancuenta and
                                          sfp_asignaciones_recursos.id_registro='.$id_registro);
      $recursosMostrar = $asignacionrecurso[0];
      return view('sfp_asignacionrecurso_editar', compact('recursos','plancuentas','recursosMostrar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AsignacionrecursoRequestActualizar $request, $id_registro)
    {
      $asignacionrecurso = sfp_asignacion_recurso::where('id_registro', $id_registro)->first();
      if($asignacionrecurso)
       {
         $asignacionrecurso->id_recurso                = $request->id_recurso;
         $asignacionrecurso->precio_recurso            = $request->precio_recurso;
         $asignacionrecurso->id_plancuenta             = $request->id_plancuenta;
         $asignacionrecurso->escenario                 = $request->escenario;
         $asignacionrecurso->cantidad_enero            = $request->cantidad_enero;
         $asignacionrecurso->cantidad_febrero          = $request->cantidad_febrero;
         $asignacionrecurso->cantidad_marzo            = $request->cantidad_marzo;
         $asignacionrecurso->cantidad_abril            = $request->cantidad_abril;
         $asignacionrecurso->cantidad_mayo             = $request->cantidad_mayo;
         $asignacionrecurso->cantidad_junio            = $request->cantidad_junio;
         $asignacionrecurso->cantidad_julio            = $request->cantidad_julio;
         $asignacionrecurso->cantidad_agosto           = $request->cantidad_agosto;
         $asignacionrecurso->cantidad_septiembre       = $request->cantidad_septiembre;
         $asignacionrecurso->cantidad_octubre          = $request->cantidad_octubre;
         $asignacionrecurso->cantidad_noviembre        = $request->cantidad_noviembre;
         $asignacionrecurso->cantidad_diciembre        = $request->cantidad_diciembre;
         $asignacionrecurso->monto_enero               = $request->cantidad_enero*$request->precio_recurso;
         $asignacionrecurso->monto_febrero             = $request->cantidad_febrero*$request->precio_recurso;
         $asignacionrecurso->monto_marzo               = $request->cantidad_marzo*$request->precio_recurso;
         $asignacionrecurso->monto_abril               = $request->cantidad_abril*$request->precio_recurso;
         $asignacionrecurso->monto_mayo                = $request->cantidad_mayo*$request->precio_recurso;
         $asignacionrecurso->monto_junio               = $request->cantidad_junio*$request->precio_recurso;
         $asignacionrecurso->monto_julio               = $request->cantidad_julio*$request->precio_recurso;
         $asignacionrecurso->monto_agosto              = $request->cantidad_agosto*$request->precio_recurso;
         $asignacionrecurso->monto_septiembre          = $request->cantidad_septiembre*$request->precio_recurso;
         $asignacionrecurso->monto_octubre             = $request->cantidad_octubre*$request->precio_recurso;
         $asignacionrecurso->monto_noviembre           = $request->cantidad_noviembre*$request->precio_recurso;
         $asignacionrecurso->monto_diciembre           = $request->cantidad_diciembre*$request->precio_recurso;
         $asignacionrecurso->save();
       }
      else
      {
          return redirect('/sfp-asignacionrecursos')->with('status', 'La asignación de recurso no existe.....');
       }
      return redirect('/sfp-asignacionrecursos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $asignacionrecurso = sfp_asignacion_recurso::where('id_registro', $id_registro);
      $asignacionrecurso->delete();
      return redirect('/sfp-asignacionrecursos')->with('status', 'La asignación de recurso ha sido eliminada exitosamente');
    }
}
