<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sfp_plancuenta;

use App\Http\Requests\PlancuentaRequestCrear;
use App\Http\Requests\PlancuentaRequestActualizar;
use Illuminate\Support\Facades\DB;
class Sfp_plancuentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /*$plancuentas=sfp_plancuenta::orderBy('id_plancuenta')->paginate(8);*/
      /*ESTO DEBE IR EN LISTAR
      </table>
      {{ $centrocostos->links() }}
      @endsection*/

      $plancuentas=sfp_plancuenta::orderBy('id_plancuenta')->get();
      return view('sfp_plancuenta_listar',compact('plancuentas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sfp_plancuenta_crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlancuentaRequestCrear $request)
    {
      //$id_registro = uniqid();

      $plancuentas=sfp_plancuenta::max('id_registro');
      $plancuentas=$plancuentas+1;
      $id_registro = $plancuentas;
      $plancuenta = new Sfp_plancuenta();
      $plancuenta->id_plancuenta       = $request->id_plancuenta;
      $plancuenta->nombre_cuenta       = $request->nombre_cuenta;
      $plancuenta->id_registro         = $id_registro;

      $plancuenta->save();
      return redirect('/sfp-plancuentas/crear')->with('status', 'La cuenta ha sido ingresada exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_registro)
    {
      $plancuenta = Sfp_plancuenta::where('id_registro', $id_registro)->first();
      return view('sfp_plancuenta_mostrar', compact('plancuenta'));
      return redirect('/sfp-plancuentas');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_registro)
    {
      $plancuenta = Sfp_plancuenta::where('id_registro', $id_registro)->first();
      return view('sfp_plancuenta_editar', compact('plancuenta'));
      return redirect('/sfp-plancuentas')->with('status', 'La cuenta ha sido modificada exitosamente');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlancuentaRequestActualizar $request, $id_registro)
    {
      $plancuenta = Sfp_plancuenta::where('id_registro', $id_registro)->first();
      if($plancuenta)
      {
          $plancuenta->nombre_cuenta = $request->nombre_cuenta;
          $plancuenta->save();
      }
      else
      {
          return redirect('/sfp-plancuentas')->with('status', 'La cuenta no existe.....');
      }
      return redirect('/sfp-plancuentas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_registro)
    {
      $plancuenta = Sfp_plancuenta::where('id_registro', $id_registro)->first();
      $plancuenta->delete();
      return redirect('/sfp-plancuentas')->with('status', 'La cuenta ha sido eliminada exitosamente');
    }
}
