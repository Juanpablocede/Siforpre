<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sfp_variable_economica;
use App\Sfp_tipo_variable;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VariableeconomicaRequestCrear;
use App\Http\Requests\VariableeconomicaRequestActualizar;
class Sfp_variableeconomicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$variableEconomica=sfp_variable_economica::orderBy('id_variable')->paginate(9);*/

      $veconomicas = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_tipovariable', '=', 'sfp_tipos_variables.id_tipovariable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->get();
      return view('sfp_variableeconomica_listar',compact('veconomicas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipovariables=Sfp_tipo_variable::orderBy('id_tipovariable')->get();
        return view('sfp_variableeconomica_crear',compact('tipovariables'));
        //return view('sfp_variableeconomica_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VariableeconomicaRequestCrear $request)
    {
      //$id_registro = uniqid();

      $veconomica=Sfp_variable_economica::max('id_registro');
      $veconomica=$veconomica+1;
      $id_registro = $veconomica;

      $veconomica = new Sfp_variable_economica();
      $veconomica->id_variable     = $request->id_variable;
      $veconomica->ano_presupuesto = $request->ano_presupuesto;
      $veconomica->id_tipovariable = $request->id_tipovariable;
      $veconomica->enero           = $request->enero;
      $veconomica->febrero         = $request->febrero;
      $veconomica->marzo           = $request->marzo;
      $veconomica->abril           = $request->abril;
      $veconomica->mayo            = $request->mayo;
      $veconomica->junio           = $request->junio;
      $veconomica->julio           = $request->julio;
      $veconomica->agosto          = $request->agosto;
      $veconomica->septiembre      = $request->septiembre;
      $veconomica->octubre         = $request->octubre;
      $veconomica->noviembre       = $request->noviembre;
      $veconomica->diciembre       = $request->diciembre;
      $veconomica->id_registro     = $id_registro;

      $veconomica->save();
      return redirect('/sfp-variableeconomicas/crear')->with('status', 'La variable económica ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      //dd($id_registro);
      $veconomica = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_tipovariable', '=', 'sfp_tipos_variables.id_tipovariable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->where('sfp_variables_economicas.id_registro', '=', $id_registro)
                  ->get();

      $variableEconomica = $veconomica[0];
      return view('sfp_variableeconomica_mostrar',compact('variableEconomica'));
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
      $veconomica = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_tipovariable', '=', 'sfp_tipos_variables.id_tipovariable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->where('sfp_variables_economicas.id_registro', '=', $id_registro)
                  ->get();
      $variableEconomica = $veconomica[0];
      return view('sfp_variableeconomica_editar',compact('variableEconomica'));
      return redirect('/sfp-variableeconomicas')->with('status', 'La variable econòmica ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VariableeconomicaRequestActualizar $request, $id_registro)
    {
      $veconomica = Sfp_variable_economica::where('id_registro', $id_registro)->first();
      if($veconomica)
      {
          $veconomica->enero      = $request->enero;
          $veconomica->febrero    = $request->febrero;
          $veconomica->marzo      = $request->marzo;
          $veconomica->abril      = $request->abril;
          $veconomica->mayo       = $request->mayo;
          $veconomica->junio      = $request->junio;
          $veconomica->julio      = $request->julio;
          $veconomica->agosto     = $request->agosto;
          $veconomica->septiembre = $request->septiembre;
          $veconomica->octubre    = $request->octubre;
          $veconomica->noviembre  = $request->noviembre;
          $veconomica->diciembre  = $request->diciembre;
          $veconomica->save();
      }
      else
      {
          return redirect('/sfp-variableeconomicas')->with('status', 'La variable económica no existe.....');
      }
      return redirect('/sfp-variableeconomicas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $veconomica = Sfp_variable_economica::where('id_registro',$id_registro)->first();
      $veconomica->delete();
      return redirect('/sfp-variableeconomicas')->with('status', 'La variable económica ha sido eliminada exitosamente');
    }
}
