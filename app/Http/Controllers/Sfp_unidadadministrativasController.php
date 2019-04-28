<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_unidad_administrativa;
use App\Sfp_empresa;
use App\Sfp_proyecto;
use App\Sfp_centrocosto;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Unidad_administrativaRequestCrear;

use App\Http\Requests\Unidad_administrativaRequestActualizar;

class Sfp_unidadadministrativasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidadadministrativas=Sfp_unidad_administrativa::orderBy('id_unidad_admin')->get();
        return view('sfp_unidadadministrativa_listar',compact('unidadadministrativas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=sfp_empresa::orderBy('id_empresa')->get();
        $proyectos=sfp_proyecto::orderBy('id_proyecto')->get();
        $centrocostos=sfp_centrocosto::orderBy('id_unidad_admin')->get();
        return view('sfp_unidadadministrativa_crear',compact('empresas','proyectos','centrocostos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Unidad_administrativaRequestCrear $request)
    {
        //$id_registro = uniqid();

        $unidadadministrativa=Sfp_unidad_administrativa::max('id_registro');
        $unidadadministrativa=$unidadadministrativa+1;
        $id_registro = $unidadadministrativa;

        $unidadadministrativa = new Sfp_unidad_administrativa();
        $unidadadministrativa->id_empresa          = $request->id_empresa;
        $unidadadministrativa->ano_presupuesto     = $request->ano_presupuesto;
        $unidadadministrativa->id_proyecto         = $request->id_proyecto;
        $unidadadministrativa->id_unidad_admin     = $request->id_unidad_admin;
        $unidadadministrativa->nombre_unidad_admin = $request->nombre_unidad_admin;
        $unidadadministrativa->id_registro         = $id_registro;

        $unidadadministrativa->save();
        return redirect('/sfp-unidadadministrativas/crear')->with('status', 'La Unidad Administrativa ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
        $unidadadministrativa = DB::table('sfp_unidades_administrativas')
                  ->join('sfp_empresas', 'sfp_unidades_administrativas.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->join('sfp_proyectos', 'sfp_unidades_administrativas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                  ->select('sfp_unidades_administrativas.*', 'sfp_empresas.nombre_empresa','sfp_proyectos.nombre_proyecto')
                  ->where('sfp_unidades_administrativas.id_registro', '=', $id_registro)
                  ->get();
        $unidadMostrar = $unidadadministrativa[0];
        return view('sfp_unidadadministrativa_mostrar', compact('unidadMostrar'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
        $unidadadministrativa = DB::table('sfp_unidades_administrativas')
                  ->join('sfp_empresas', 'sfp_unidades_administrativas.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->join('sfp_proyectos', 'sfp_unidades_administrativas.id_proyecto', '=', 'sfp_proyectos.id_proyecto')
                  ->select('sfp_unidades_administrativas.*', 'sfp_empresas.nombre_empresa','sfp_proyectos.nombre_proyecto')
                  ->where('sfp_unidades_administrativas.id_registro', '=', $id_registro)
                  ->get();
        $unidadMostrar = $unidadadministrativa[0];
        return view('sfp_unidadadministrativa_editar', compact('unidadMostrar'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Unidad_administrativaRequestActualizar $request, $id_registro)
    {
        $unidadadministrativa = Sfp_unidad_administrativa::where('id_registro', $id_registro)->first();
        if($unidadadministrativa)
        {
            $unidadadministrativa->nombre_unidad_admin   = $request->nombre_unidad_admin;
            $unidadadministrativa->save();
        }
        else
        {
            return redirect('/sfp-unidadadministrativas')->with('status', 'La unidad administrativa no existe.....');
         }
        return redirect('/sfp-unidadadministrativas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
        $unidadadministrativa = Sfp_unidad_administrativa::where('id_registro', $id_registro);
        $unidadadministrativa->delete();
        return redirect('/sfp-unidadadministrativas')->with('status', 'La unidad administrativa ha sido eliminada exitosamente');
    }
}
