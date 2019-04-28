<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_fuente_financiamiento;
use App\Sfp_empresa;

use App\Http\Requests\FuentefinanciamientoRequestCrear;
use App\Http\Requests\FuentefinanciamientoRequestActualizar;
use Illuminate\Support\Facades\DB;

class Sfp_fuentes_financiamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $fuentes=Sfp_fuente_financiamiento::orderBy('id_fuente_financiamiento')->get();
      return view('sfp_fuentefinanciamiento_listar',compact('fuentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresas=sfp_empresa::orderBy('id_empresa')->get();
        return view('sfp_fuentefinanciamiento_crear',compact('empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuentefinanciamientoRequestCrear $request)
    {
      //$id_registro = uniqid();

      $fuentes=Sfp_fuente_financiamiento::max('id_registro');
      $fuentes=$fuentes+1;
      $id_registro = $fuentes;
      $fuentes = new Sfp_fuente_financiamiento();
      $fuentes->id_empresa                    = $request->id_empresa;
      $fuentes->ano_presupuesto               = $request->ano_presupuesto;
      $fuentes->id_fuente_financiamiento      = $request->id_fuente_financiamiento;
      $fuentes->nombre_fuente_financiamiento  = $request->nombre_fuente_financiamiento;
      $fuentes->id_registro                   = $id_registro;

      $fuentes->save();
      return redirect('/sfp-fuentefinanciamientos/crear')->with('status', 'La fuente de financiamiento ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {

      $fuente = DB::table('sfp_fuentes_financiamientos')
                  ->join('sfp_empresas', 'sfp_fuentes_financiamientos.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->select('sfp_fuentes_financiamientos.*', 'sfp_empresas.nombre_empresa')
                  ->where('sfp_fuentes_financiamientos.id_registro', $id_registro)
                  ->get();
      $fuenteMostrar = $fuente[0];
      return view('sfp_fuentefinanciamiento_mostrar', compact('fuenteMostrar'));
      return redirect('/sfp-fuentefinanciamientos');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $fuente = DB::table('sfp_fuentes_financiamientos')
                  ->join('sfp_empresas', 'sfp_fuentes_financiamientos.id_empresa', '=', 'sfp_empresas.id_empresa')
                  ->select('sfp_fuentes_financiamientos.*', 'sfp_empresas.nombre_empresa')
                  ->where('sfp_fuentes_financiamientos.id_registro', $id_registro)
                  ->get();
      $fuenteMostrar = $fuente[0];
      return view('sfp_fuentefinanciamiento_editar', compact('fuenteMostrar'));
      return redirect('/sfp-fuentefinanciamientos')->with('status', 'La fuente ha sido modificada exitosamente');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuentefinanciamientoRequestActualizar $request, $id_registro)
    {
      $fuente = Sfp_fuente_financiamiento::where('id_registro', $id_registro)->first();
      if($fuente)
      {
          $fuente->nombre_fuente_financiamiento = $request->nombre_fuente_financiamiento;
          $fuente->save();
      }
      else
      {
          return redirect('/sfp-fuentefinanciamientos')->with('status', 'La fuente no existe.....');
      }
      return redirect('/sfp-fuentefinanciamientos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $fuente = Sfp_fuente_financiamiento::where('id_registro', $id_registro);
      $fuente->delete();
      return redirect('/sfp-fuentefinanciamientos')->with('status', 'La fuente ha sido eliminada exitosamente');
    }
}
