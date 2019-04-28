<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_empresa;
use App\Http\Requests\EmpresaRequestCrear;
use App\Http\Requests\EmpresaRequestActualizar;
use Illuminate\Support\Facades\DB;
class Sfp_empresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$empresas=sfp_empresa::orderBy('id_empresa')->paginate(8);*/
      $empresas=sfp_empresa::orderBy('id_empresa')->get();
      return view('sfp_empresa_listar',compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_empresa_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresaRequestCrear $request)
    {

        //$id_registro = uniqid();

        $empresa=Sfp_empresa::max('id_registro');
        $empresa=$empresa+1;
        $id_registro = $empresa;

        $empresa = new Sfp_empresa();
        $empresa->id_empresa       = $request->id_empresa;
        $empresa->nombre_empresa   = $request->nombre_empresa;
        $empresa->direccion_empresa= $request->direccion_empresa;
        $empresa->rif              = $request->rif;
        $empresa->telefonos        = $request->telefonos;
        $empresa->persona_contacto = $request->persona_contacto;
        $empresa->id_registro      = $id_registro;

        $empresa -> save();
        return redirect('/sfp-empresas/crear')->with('status', 'La empresa ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
        $empresa = Sfp_empresa::where('id_registro', $id_registro)->first();
        return view('sfp_empresa_mostrar', compact('empresa'));
        return redirect('/sfp-empresas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
        $empresa = Sfp_empresa::where('id_registro', $id_registro)->first();
        return view('sfp_empresa_editar', compact('empresa'));
        return redirect('/sfp-empresas')->with('status', 'La empresa ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaRequestActualizar $request, $id_registro)
    {
          $empresa = Sfp_empresa::where('id_registro', $id_registro)->first();
          if($empresa)
          {
              $empresa->nombre_empresa   = $request->nombre_empresa;
              $empresa->direccion_empresa= $request->direccion_empresa;
              $empresa->rif              = $request->rif;
              $empresa->telefonos        = $request->telefonos;
              $empresa->persona_contacto = $request->persona_contacto;
              $empresa->save();
          }
          else
          {
              return redirect('/sfp-empresas')->with('status', 'La empresa no existe.....');
          }
          return redirect('/sfp-empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
        $empresa = Sfp_empresa::where('id_registro', $id_registro)->first();
        $empresa->delete();
        return redirect('/sfp-empresas')->with('status', 'La empresa ha sido eliminada exitosamente');
    }
}
