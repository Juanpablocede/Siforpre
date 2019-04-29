@extends('layouts.layout')
@section('titulo', 'Acción Especifica Listar')
@section('content')
<div class="row justify-content-center w-100 mt-3">
	<div class="col-10">
		<div class="card card-table" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Accciones Especificas</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-accionespecificas/crear" name="guardar" id="guardar">
										<i class="fas fa-plus-circle"></i>
									</a>
										<a class="btn btn-primary" href="/siforpre" name="salir" id="salir">
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
								<th class="titulo" scope="col">Empresa</th>
								<th class="titulo" scope="col">Año</th>
								<th class="titulo" scope="col">Proyecto</th>
								<th class="titulo" scope="col">Unidad</th>
								<th class="titulo" scope="col">Acción</th>
								<th class="titulo" scope="col">Nombre</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					     @if($accionesespecificas->count())
					     @foreach($accionesespecificas as $accionesespecifica)
						   <tr class="detalle link-tr">
								 <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->id_empresa}}</a></td>
								 <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->ano_presupuesto}}</a></td>
						     <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->id_proyecto}}</a></td>
								 <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->id_unidad_admin}}</a></td>
								 <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->id_accion_especifica}}</a></td>
								 <td><a class="a-table" href="/sfp-accionespecificas/{!! $accionesespecifica->id_registro !!}/mostrar">{{$accionesespecifica->nombre_accion_especifica}}</a></td>
								 <td>
										<a class="figura" href="{!! action('Sfp_acciones_especificasController@edit', $accionesespecifica->id_registro) !!}" >
											<i class="figura far fa-edit"></i>
										</a>
								 </td>

								 <td>
									 <button style="cursor:pointer" class="eliminar eliminar-acciones" data-target="#eliminar-acciones-{!! $accionesespecifica->id_registro !!}" data-toggle="modal" type="button">
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
@foreach($accionesespecificas as $accionesespecifica)
<!-- Modal -->
<div class="modal fade" id="eliminar-acciones-{!! $accionesespecifica->id_registro !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Estás seguro que deseas eliminar esta estructura de acciones especificas?
				<div class="mensaje-eliminar">
					{!! $accionesespecifica->id_empresa !!}
					{!! $accionesespecifica->ano_presupuesto !!}
					{!! $accionesespecifica->id_proyecto !!}
					{!! $accionesespecifica->id_unidad_admin !!}
					{!! $accionesespecifica->id_accion_especifica !!}
					{!! $accionesespecifica->nombre_accion_especifica !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form id="form-eliminar-acciones" action="{!! action('Sfp_acciones_especificasController@destroy', $accionesespecifica->id_registro)  !!}" method="post">
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
@endforeach
@endsection
