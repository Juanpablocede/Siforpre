<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sfp_variable_economica;
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

      $variables = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_variable', '=', 'sfp_tipos_variables.id_variable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->get();
      return view('sfp_variableeconomica_listar',compact('variables'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_variableeconomica_crear');
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

      $variable=Sfp_variable_economica::max('id_registro');
      $variable=$variable+1;
      $id_registro = $variable;

      $variable = new Sfp_variable_economica();
      $variable->id_variable     = $request->id_variable;
      $variable->ano_presupuesto = $request->ano_presupuesto;
      $variable->id_tipovariable = $request->id_tipovariable;
      $variable->enero           = $request->enero;
      $variable->febrero         = $request->febrero;
      $variable->marzo           = $request->marzo;
      $variable->abril           = $request->abril;
      $variable->mayo            = $request->mayo;
      $variable->junio           = $request->junio;
      $variable->julio           = $request->julio;
      $variable->agosto          = $request->agosto;
      $variable->septiembre      = $request->septiembre;
      $variable->octubre         = $request->octubre;
      $variable->noviembre       = $request->noviembre;
      $variable->diciembre       = $request->diciembre;
      $variable->id_registro     = $id_registro;

      $variable->save();
      return redirect('/sfp-variableeconomicas/crear')->with('status', 'La variable económica ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sfp_variable_economica  $sfp_variable_economica
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {

      $variable = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_variable', '=', 'sfp_tipos_variables.id_variable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->where('sfp_variables_economicas.id_registro', '=', $id_registro)
                  ->get();
      return view('sfp_variableeconomica_listar',compact('variable'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sfp_variable_economica  $sfp_variable_economica
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $variable = DB::table('sfp_variables_economicas')
                  ->join('sfp_tipos_variables', 'sfp_variables_economicas.id_variable', '=', 'sfp_tipos_variables.id_variable')
                  ->select('sfp_variables_economicas.*',
                           'sfp_tipos_variables.nombre_variable')
                  ->where('sfp_variables_economicas.id_registro', '=', $id_registro)
                  ->get();
      return view('sfp_variableeconomica_listar',compact('variable'));
      return redirect('/sfp-variableeconomicas')->with('status', 'La variable econòmica ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sfp_variable_economica  $sfp_variable_economica
     * @return \Illuminate\Http\Response
     */
    public function update(VariableeconomicaRequestActualizar $request, $id_registro)
    {
      $variable = Sfp_variable_economica::where('id_registro', $id_registro)->first();
      if($variable)
      {
          $variable->enero      = $request->enero;
          $variable->febrero    = $request->febrero;
          $variable->marzo      = $request->marzo;
          $variable->abril      = $request->abril;
          $variable->mayo       = $request->mayo;
          $variable->junio      = $request->junio;
          $variable->julio      = $request->julio;
          $variable->agosto     = $request->agosto;
          $variable->septiembre = $request->septiembre;
          $variable->octubre    = $request->octubre;
          $variable->noviembre  = $request->noviembre;
          $variable->diciembre  = $request->diciembre;
          $variable->save();
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
     * @param  \App\Sfp_variable_economica  $sfp_variable_economica
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $variable = Sfp_variable_economica::where('id_registro',$id_registro)->first();
      $variable->delete();
      return redirect('/sfp-variableeconomicas')->with('status', 'La variable económica ha sido eliminada exitosamente');
    }
}
