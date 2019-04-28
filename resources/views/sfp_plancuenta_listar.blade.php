@extends('layouts.layout')
@section('titulo', 'Plan de Cuentas Listar')
@section('content')

<div class="row justify-content-center w-100 mt-3">
	<div class="col-10">
		<div class="card card-table" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Plan de Cuentas</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-plancuentas/crear" name="guardar" id="guardar">
										<i class="fas fa-plus-circle"></i>
									</a>
									<a class="btn btn-primary" href="{{ URL::previous() }}" name="salir" id="salir">
										<i class="fas fa-sign-out-alt"></i>
									</a>
								</div>
							</div>
						</div>
				</li>
		    <li class="list-group-item p-0">
					<table id="DataTabla" class="table table-hover">
						<thead>
							<tr>
								<th class="titulocodigoempresa" scope="col">Código</th>
								<th class="titulonombreempresa" scope="col">Nombre</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					       @if($plancuentas->count())
					       @foreach($plancuentas as $plancuenta)
						   <tr class="detalle link-tr">
						         <td><a class="a-table" href="/sfp-plancuentas/{!! $plancuenta->id_registro !!}/mostrar">{{$plancuenta->id_plancuenta}}</a></td>
						         <td><a class="a-table" href="/sfp-plancuentas/{!! $plancuenta->id_registro !!}/mostrar">{{$plancuenta->nombre_cuenta}}</a></td>
								 <td>
									<a class="figura" href="{!! action('Sfp_plancuentasController@edit', $plancuenta->id_registro) !!}" >
										<i class="figura far fa-edit"></i>
									</a>
								 </td>

								 <td>
									<button style="cursor:pointer" class="eliminar" data-toggle="modal" data-target="#modal-eliminar-plancuenta" type="submit">
										<i class="eliminar fa fa-trash-alt"></i>
									</button>
								</td>

							</tr>
					        @endforeach
					        @else
					        <tr>
					         <td colspan="8">No hay registro disponible para mostar.</td>
					       </tr>
					       @endif
					    </tbody>

					</table>
				</li>
		  </ul>
		</div>
	</div>
</div>
@if($plancuentas->count()>0)
<!-- Modal -->
<div class="modal fade" id="modal-eliminar-plancuenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Estás seguro que deseas eliminar Este Plan de Cuenta?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form  action="{!! action('Sfp_plancuentasController@destroy', $plancuenta->id_registro)  !!}" method="post">
					 <input type="hidden" name="_token" value="{!! csrf_token() !!}">
					 <a class="figura">
						 <button class="btn btn-primary" type="submit">
							 Si, eliminar
						 </button>
					 </a>
				</form>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
