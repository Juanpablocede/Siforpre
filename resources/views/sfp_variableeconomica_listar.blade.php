@extends('layouts.layout')
@section('titulo', 'Variables Economicas Listar')
@section('content')

<div class="row justify-content-center w-100 mt-3">
	<div class="col-12 w-100">
		<div class="card card-table p-0" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Variables Económicas</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-variableeconomicas/crear" name="guardar" id="guardar">
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
					<table id="DataTabla" class="table table-responsive table-hover">
						<thead>
							<tr>
								<th class="tituloveconomiva" scope="col">Código</th>
								<th class="tituloveconomiva" scope="col">Año</th>
								<th class="tituloveconomiva" scope="col">Nombre</th>
								<th class="tituloveconomiva" scope="col">Enero</th>
								<th class="tituloveconomiva" scope="col">Febrero</th>
								<th class="tituloveconomiva" scope="col">Marzo</th>
								<th class="tituloveconomiva" scope="col">Abril</th>
								<th class="tituloveconomiva" scope="col">Mayo</th>
								<th class="tituloveconomiva" scope="col">Junio</th>
								<th class="tituloveconomiva" scope="col">Julio</th>
								<th class="tituloveconomiva" scope="col">Agosto</th>
								<th class="tituloveconomiva" scope="col">Septiembre</th>
								<th class="tituloveconomiva" scope="col">Octubre</th>
								<th class="tituloveconomiva" scope="col">Noviembre</th>
								<th class="tituloveconomiva" scope="col">Diciembre</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					    @if($veconomicas->count())
					    @foreach($veconomicas as $veconomica)
						  <tr class="detalle link-tr">
						     <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{$veconomica->id_variable}}</a></td>
						     <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{$veconomica->ano_presupuesto}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{$veconomica->nombre_variable}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->enero, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->febrero, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->marzo, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->abril, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->mayo, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->junio, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->julio, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->agosto, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->septiembre, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->octubre, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->noviembre, 2, ",", ".")}}</a></td>
								 <td><a class="a-table" href="/sfp-variableeconomicas/{!! $veconomica->id_registro !!}/mostrar">{{number_format($veconomica->diciembre, 2, ",", ".")}}</a></td>
								 <td>
										<a class="figura" href="{!! action('Sfp_variableeconomicasController@edit', $veconomica->id_registro) !!}" >
											<i class="figura far fa-edit"></i>
										</a>
								 </td>

								 <td>
										<button style="cursor:pointer" class="eliminar eliminar-veconomiva" data-target="#eliminar-veconomica-{!! $veconomica->id_registro !!}" data-toggle="modal" type="button">
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
@foreach($veconomicas as $veconomica)
<!-- Modal -->
<div class="modal fade" id="eliminar-veconomica-{!! $veconomica->id_registro !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Estás seguro que deseas eliminar esta variable economica?
				<div class="mensaje-eliminar">
					{!! $veconomica->id_variable !!} {!! $veconomica->nombre_variable !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form id="form-eliminar-veconomica" action="{!! action('Sfp_variableeconomicasController@destroy', $veconomica->id_registro)  !!}" method="post">
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
