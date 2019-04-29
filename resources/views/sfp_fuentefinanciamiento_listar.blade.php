@extends('layouts.layout')
@section('titulo', 'Fuente Financiamiento Listar')
@section('content')

<div class="row justify-content-center w-100 mt-3">
	<div class="col-10">
		<div class="card card-table" style="width: 100%">
		  <ul class="list-group list-group-flush">
		    <li class="list-group-item card-head">
						<div class="row">
							<div class="col-4">
								<h4>Listado Fuentes Financiamientos</h4>
							</div>
							<div class="col-8 float-left">
								<div class="row">
									<input id="buscar-tabla" type="text" class="form-control" placeholder="Buscar" aria-label="Input group example" aria-describedby="btnGroupAddon">
								</div>
								<div class="row justify-content-end">
									<a class="btn btn-primary" href="/sfp-fuentefinanciamientos/crear" name="guardar" id="guardar">
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
								<th class="titulo" scope="col">Fuente</th>
								<th class="titulo" scope="col">Nombre</th>
								<th class="tituloactualizar" scope="col">&nbsp;</th>
								<th class="tituloeliminar" scope="col">&nbsp;</th>
							</tr>
					   </thead>
						 <tbody>
					       @if($fuentes->count())
					       @foreach($fuentes as $fuente)
						   <tr class="detalle link-tr">
								 <td><a class="a-table" href="/sfp-fuentefinanciamientos/{!! $fuente->id_registro !!}/mostrar">{{$fuente->id_empresa}}</a></td>
								 <td><a class="a-table" href="/sfp-fuentefinanciamientos/{!! $fuente->id_registro !!}/mostrar">{{$fuente->ano_presupuesto}}</a></td>
						     <td><a class="a-table" href="/sfp-fuentefinanciamientos/{!! $fuente->id_registro !!}/mostrar">{{$fuente->id_fuente_financiamiento}}</a></td>
								 <td><a class="a-table" href="/sfp-fuentefinanciamientos/{!! $fuente->id_registro !!}/mostrar">{{$fuente->nombre_fuente_financiamiento}}</a></td>
								 <td>
										<a class="figura" href="{!! action('Sfp_fuentes_financiamientosController@edit', $fuente->id_registro) !!}">
											<i class="figura far fa-edit"></i>
										</a>
								 </td>

								 <td>
									 <button style="cursor:pointer" class="eliminar eliminar-fuente" data-target="#eliminar-fuente-{!! $fuente->id_registro !!}" data-toggle="modal" type="button">
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
@foreach($fuentes as $fuente)
<!-- Modal -->
<div class="modal fade" id="eliminar-fuente-{!! $fuente->id_registro !!}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Estás seguro que deseas eliminar esta fuente?
				<div class="mensaje-eliminar">
					{!! $fuente->id_fuente_financiamiento !!}
					{!! $fuente->nombre_fuente_financiamiento !!}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
				<form id="form-eliminar-fuente" action="{!! action('Sfp_fuentes_financiamientosController@destroy', $fuente->id_registro)  !!}" method="post">
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
