<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_proyecto;
use App\Sfp_empresa;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProyectoRequestCrear;
use App\Http\Requests\ProyectoRequestActualizar;

class Sfp_proyectosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$proyectos=sfp_proyecto::orderBy('id_proyecto')->paginate(8);*/
      $proyectos=sfp_proyecto::orderBy('id_proyecto')->get();
      return view('sfp_proyecto_listar',compact('proyectos'));

      /*$proyectos = DB::select('select
                                lpad(sfp_proyectos.id_empresa,4,'0'),
                                sfp_proyectos.ano_presupuesto,
                                lpad(sfp_proyectos.id_proyecto,25,'0'),
                                sfp_proyectos.nombre_proyecto,
                                sfp_proyectos.tipo
                              from
                                sfp_proyectos
                              order by
                                sfp_proyectos.id_proyecto');
      echo $proyectos;die();
      return view('sfp_proyecto_listar',compact('proyectos'));*/

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=sfp_empresa::orderBy('id_empresa')->get();
        return view('sfp_proyecto_crear',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProyectoRequestCrear $request)
    {
      //$id_registro = uniqid();

      $proyecto=Sfp_proyecto::max('id_registro');
      $proyecto=$proyecto+1;
      $id_registro = $proyecto;

      $proyecto = new Sfp_proyecto();
      $proyecto->id_empresa       = $request->id_empresa;
      $proyecto->ano_presupuesto  = $request->ano_presupuesto;
      $proyecto->id_proyecto      = $request->id_proyecto;
      $proyecto->nombre_proyecto  = $request->nombre_proyecto;
      $proyecto->tipo             = $request->tipo;
      $proyecto->id_registro      = $id_registro;

      $proyecto->save();
      return redirect('/sfp-proyectos/crear')->with('status', 'El proyecto ha sido ingresado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      //$proyecto = Sfp_proyecto::where('id_proyecto', $id_proyecto)->first();
      /*$proyecto = Sfp_proyecto::find($id_proyecto);
      return view('sfp_proyecto_mostrar', compact('proyecto'));
      return redirect('/sfp-proyectos');*/


      $proyecto = DB::table('sfp_proyectos')
                  ->join('sfp_empresas', 'sfp_proyectos.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->select('sfp_proyectos.*', 'sfp_empresas.nombre_empresa')
                  ->where('sfp_proyectos.id_registro', $id_registro)
                  ->get();
      $proyectoMostrar = $proyecto[0];
      return view('sfp_proyecto_mostrar', compact('proyectoMostrar'));
      return redirect('/sfp-proyectos');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      /*$proyecto = Sfp_proyecto::where('id_proyecto', $id_proyecto)->first();
      return view('sfp_proyecto_editar', compact('proyecto'));
      return redirect('/sfp-proyectos')->with('status', 'El proyecto ha sido modificado exitosamente');*/

      $proyecto = DB::table('sfp_proyectos')
                  ->join('sfp_empresas', 'sfp_proyectos.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->select('sfp_proyectos.*', 'sfp_empresas.nombre_empresa')
                  ->where('sfp_proyectos.id_registro', $id_registro)
                  ->get();
      $proyectoMostrar = $proyecto[0];
      return view('sfp_proyecto_editar', compact('proyectoMostrar'));
      return redirect('/sfp-proyectos');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProyectoRequestActualizar $request, $id_registro)
    {
      $proyecto = Sfp_proyecto::where('id_registro', $id_registro)->first();
      if($proyecto)
      {
          $proyecto->nombre_proyecto   = $request->nombre_proyecto;
          $proyecto->tipo              = $request->tipo;
          $proyecto->save();
      }
      else
      {
          return redirect('/sfp-proyectos')->with('status', 'El proyecto no existe.....');
      }
      return redirect('/sfp-proyectos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $proyecto = Sfp_proyecto::where('id_registro', $id_registro)->first();
      $proyecto->delete();
      return redirect('/sfp-proyectos')->with('status', 'El proyecto ha sido eliminado exitosamente');
    }
}
