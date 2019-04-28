@extends('layouts.layout')
@section('titulo', 'Asignación Recursos Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-10 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Asignación de Recursos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="id_empresa">Código Empresa</label>
							<input class="form-control" value="{!! $recursosMostrar->id_empresa !!}" readonly type="text" name="id_empresa" id="id_empresa" placeholder="codigo empresa">
						</div>
						<div class="p-1 col-md-6">
							<label class="text-secondary" for="nombre_empresa">Nombre Empresa</label>
							<input class="form-control" value="{!! $recursosMostrar->nombre_empresa !!}" readonly type="text" name="nombre_empresa" id="nombre_empresa" placeholder="nombre empresa">
						</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
							<input class="form-control" value="{!! $recursosMostrar->ano_presupuesto !!}" readonly type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año presupuesto">
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary" for="id_proyecto">Código Proyecto</label>
							<input class="form-control" value="{!! $recursosMostrar->id_proyecto !!}" readonly  type="text" name="id_proyecto" id="id_proyecto" placeholder="código proyecto">
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_proyecto">Nombre Proyecto</label>
							<input class="form-control" value="{!! $recursosMostrar->nombre_proyecto !!}" readonly type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre proyecto">
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary" for="id_unidad_admin">Código Administrativo</label>
							<input class="form-control" value="{!! $recursosMostrar->id_unidad_admin !!}" readonly  type="text" name="id_unidad_admin" id="id_unidad_admin" placeholder="código unidad administrativa">
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_unidad_admin">Nombre Unidad Administrativa</label>
							<input class="form-control" value="{!! $recursosMostrar->nombre_unidad_admin !!}" readonly type="text" name="nombre_unidad_admin" id="nombre_unidad_admin" placeholder="nombre unidad administrativa">
						</div>
						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="id_accion_especifica">Código Especifica</label>
								<input class="form-control" value="{!! $recursosMostrar->id_accion_especifica !!}" readonly type="text" name="id_accion_especifica" id="id_accion_especifica" placeholder="código acción especifica">
						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="nombre_accion_especifica">Nombre Acción Especifica</label>
								<input class="form-control" value="{!! $recursosMostrar->nombre_accion_especifica !!}" readonly type="text" name="nombre_accion_especifica" id="nombre_accion_especifica" placeholder="nombre acción especifica">
						</div>
						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="id_actividad">Código Actividad</label>
								<input class="form-control" value="{!! $recursosMostrar->id_actividad !!}" readonly type="text" name="id_actividad" id="id_actividad" placeholder="código actividad">
						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="nombre_actividad">Nombre Actividad</label>
								<input class="form-control" value="{!! $recursosMostrar->nombre_actividad !!}" readonly type="text" name="nombre_actividad" id="nombre_actividad" placeholder="nombre actividad">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="id_fuente_financiamiento">Financiamiento</label>
								<input class="form-control" value="{!! $recursosMostrar->id_fuente_financiamiento !!}" readonly type="text" name="id_fuente_financiamiento" id="id_fuente_financiamiento" placeholder="código fuente financiamiento">
						</div>
						<div class="p-1 col-md-6">
								<label class=" text-secondary" for="nombre_fuente_financiamiento">Nombre Fuente Financiamiento</label>
								<input class="form-control" value="{!! $recursosMostrar->nombre_fuente_financiamiento !!}" readonly type="text" name="nombre_fuente_financiamiento" id="nombre_fuente_financiamiento" placeholder="nombre fuente financiamiento">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="tipo">Tipo</label>
								<input class="form-control" value="{!! $recursosMostrar->tipo !!}" readonly type="text" name="tipo" id="tipo" placeholder="tipo financiamiento">
						</div>
						<div class="p-1 col-md-8">
							<label class=" text-secondary" for="id_recurso">Código Recurso</label>
							<select class="form-control centroCosto" type="text" value="" name="id_recurso" id="id_recurso">
								@foreach($recursos as $recurso)
									<option value="{!! $recurso->id_recurso !!}">{{ $recurso->id_recurso.' '.$recurso->nombre_recurso }}</option>
								@endforeach
							</select>
						</div>
						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="precio_recurso">Precio Recurso</label>
								<input class="form-control" value="{!! $recursosMostrar->precio_recurso !!}" readonly type="text" name="precio_recurso" id="precio_recurso" placeholder="precio recurso">
						</div>
						<div class="p-1 col-md-10">
							<label class=" text-secondary" for="id_plancuenta">Plan de cuentas</label>
							<select class="form-control centroCosto" type="text" value="" name="id_plancuenta" id="id_plancuenta">
								@foreach($plancuentas as $plancuenta)
									<option value="{!! $plancuenta->id_plancuenta !!}">{{ $plancuenta->id_plancuenta.' '.$plancuenta->nombre_cuenta }}</option>
								@endforeach
							</select>
						</div>
						<div class="p-1 col-md-2">
							  <label class=" text-secondary" for="escenario">Escenario</label>
								<select class="form-control" name="escenario" id="escenario">
									<option value="1" select>1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
								</select>
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_enero">Enero</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_enero !!}" type="text" name="cantidad_enero" id="cantidad_enero" placeholder="cantidad enero">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_febrero">Febrero</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_febrero !!}" type="text" name="cantidad_febrero" id="cantidad_febrero" placeholder="cantidad febrero">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_marzo">Marzo</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_marzo !!}" type="text" name="cantidad_marzo" id="cantidad_marzo" placeholder="cantidad marzo">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_abril">Abril</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_abril !!}" type="text" name="cantidad_abril" id="cantidad_abril" placeholder="cantidad abril">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_mayo">Mayo</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_mayo !!}" type="text" name="cantidad_mayo" id="cantidad_mayo" placeholder="cantidad mayo">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_junio">Junio</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_junio !!}" type="text" name="cantidad_junio" id="cantidad_junio" placeholder="cantidad junio">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_julio">Julio</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_julio !!}" type="text" name="cantidad_julio" id="cantidad_julio" placeholder="cantidad julio">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_agosto">agosto</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_agosto !!}" type="text" name="cantidad_agosto" id="cantidad_agosto" placeholder="cantidad agosto">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_septiembre">Septiembre</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_septiembre !!}" type="text" name="cantidad_septiembre" id="cantidad_septiembre" placeholder="cantidad septiembre">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_octubre">octubre</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_octubre !!}" type="text" name="cantidad_octubre" id="cantidad_octubre" placeholder="cantidad octubre">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_noviembre">noviembre</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_noviembre !!}" type="text" name="cantidad_noviembre" id="cantidad_noviembre" placeholder="cantidad noviembre">
						</div>
						<div class="p-1 col-md-3">
								<label class=" text-secondary" for="cantidad_diciembre">diciembre</label>
								<input class="form-control" value="{!! $recursosMostrar->cantidad_diciembre !!}" type="text" name="cantidad_diciembre" id="cantidad_diciembre" placeholder="cantidad diciembre">
						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-asignacionrecursos" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
 								</a>
 						</div>
 						<input type="hidden" name="_token" value="{!! csrf_token() !!}">

						@include('error')

	 					@if(session('status'))
	 					<div class="col-md-12 alert alert-success" role="alert">
	 							{{ session('status') }}
	 					</div>
	 					@endif
					</div>
				</div>
			</div>
</form>
@endsection
