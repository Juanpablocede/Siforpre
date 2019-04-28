@extends('layouts.layout')
@section('titulo', 'Asignacion Recurso Listar')
@section('content')
<div class="row justify-content-center w-100 mt-3">
	<div class="col-10">
		<div class="card card-table" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Asignación de Recursos</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-asignacionrecursos/crear" name="guardar" id="guardar">
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
					<table id="DataTabla" class="table table-responsive table-hover">
						<thead>
							<tr>
								<th class="titulo" scope="col">Empresa</th>
								<th class="titulo" scope="col">Año</th>
								<th class="titulo" scope="col">Proyecto</th>
								<th class="titulo" scope="col">Unidad</th>
								<th class="titulo" scope="col">Acción</th>
								<th class="titulo" scope="col">Actividad</th>
								<th class="titulo" scope="col">Fuente</th>
								<th class="titulo" scope="col">Tipo</th>
								<th class="titulo" scope="col">Recurso</th>
								<th class="titulo" scope="col">Precio</th>
								<th class="titulo" scope="col">Plancuenta</th>
								<th class="titulo" scope="col">Escenario</th>
								<th class="titulo" scope="col">Enero</th>
								<th class="titulo" scope="col">Febrero</th>
								<th class="titulo" scope="col">Marzo</th>
								<th class="titulo" scope="col">Abril</th>
								<th class="titulo" scope="col">Mayo</th>
								<th class="titulo" scope="col">Junio</th>
								<th class="titulo" scope="col">Julio</th>
								<th class="titulo" scope="col">Agosto</th>
								<th class="titulo" scope="col">Septiembre</th>
								<th class="titulo" scope="col">Octubre</th>
								<th class="titulo" scope="col">Noviembre</th>
								<th class="titulo" scope="col">Diciembre</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					     @if($asignacionrecursos->count())
					     @foreach($asignacionrecursos as $asignacionrecurso)
						   <tr class="detalle link-tr">
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_empresa}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->ano_presupuesto}}</a></td>
						     <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_proyecto}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_unidad_admin}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_accion_especifica}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_actividad}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_fuente_financiamiento}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->tipo}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_recurso}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{number_format($asignacionrecurso->precio_recurso, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->id_plancuenta}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->escenario}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_enero}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_febrero}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_marzo}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_abril}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_mayo}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_junio}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_julio}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_agosto}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_septiembre}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_octubre}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_noviembre}}</a></td>
								 <td><a class="a-table" href="/sfp-asignacionrecursos/{!! $asignacionrecurso->id_registro !!}/mostrar">{{$asignacionrecurso->cantidad_diciembre}}</a></td>
								 <td>
										<a class="figura" href="{!! action('Sfp_asignaciones_recursosController@edit', $asignacionrecurso->id_registro) !!}" >
											<i class="figura far fa-edit"></i>
										</a>
								 </td>

								 <td>
									 <button style="cursor:pointer" class="eliminar eliminar-asignaciorecurso" data-target="#eliminar-asignacionrecurso-{!! $asignacionrecurso->id_registro !!}" data-toggle="modal" type="button">
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
@foreach($asignacionrecursos as $asignacionrecurso)
<!-- Modal -->
<div class="modal fade" id="eliminar-asignacionrecurso-{!! $asignacionrecurso->id_registro !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Estás seguro que deseas eliminar este recurso?
				<div class="mensaje-eliminar">
					{!! $asignacionrecurso->id_empresa !!}
					{!! $asignacionrecurso->ano_presupuesto !!}
					{!! $asignacionrecurso->id_proyecto !!}
					{!! $asignacionrecurso->id_unidad_admin !!}
					{!! $asignacionrecurso->id_accion_especifica !!}
					{!! $asignacionrecurso->id_actividad !!}
					{!! $asignacionrecurso->id_duente_financiamiento !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form id="form-eliminar-asignacionrecurso" action="{!! action('Sfp_asignaciones_recursosController@destroy', $asignacionrecurso->id_registro)  !!}" method="post">
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
