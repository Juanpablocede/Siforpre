@extends('layouts.layout')
@section('titulo', 'Actividades Mostrar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Actividades<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="id_empresa">Código Empresa</label>
							<input class="form-control" value="{!! $actividadesMostrar->id_empresa !!}" readonly type="text" name="id_empresa" id="id_empresa" placeholder="codigo empresa">
						</div>
						<div class="p-1 col-md-6">
							<label class="text-secondary" for="nombre_empresa">Nombre Empresa</label>
							<input class="form-control" value="{!! $actividadesMostrar->nombre_empresa !!}" readonly type="text" name="nombre_empresa" id="nombre_empresa" placeholder="nombre empresa">
						</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
							<input class="form-control" value="{!! $actividadesMostrar->ano_presupuesto !!}" readonly type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año presupuesto">
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary" for="id_proyecto">Código Proyecto</label>
							<input class="form-control" value="{!! $actividadesMostrar->id_proyecto !!}" readonly  type="text" name="id_proyecto" id="id_proyecto" placeholder="código proyecto">
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_proyecto">Nombre Proyecto</label>
							<input class="form-control" value="{!! $actividadesMostrar->nombre_proyecto !!}" readonly type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre proyecto">
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary" for="id_unidad_admin">Código Administrativo</label>
							<input class="form-control" value="{!! $actividadesMostrar->id_unidad_admin !!}" readonly  type="text" name="id_unidad_admin" id="id_unidad_admin" placeholder="código unidad administrativa">
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_unidad_admin">Nombre Unidad Administrativa</label>
							<input class="form-control" value="{!! $actividadesMostrar->nombre_unidad_admin !!}" readonly type="text" name="nombre_unidad_admin" id="nombre_unidad_admin" placeholder="nombre unidad administrativa">
						</div>
						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="id_accion_especifica">Código Especifica</label>
								<input class="form-control" value="{!! $actividadesMostrar->id_accion_especifica !!}" readonly type="text" name="id_accion_especifica" id="id_accion_especifica" placeholder="código acción especifica">
						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="nombre_accion_especifica">Nombre Acción Especifica</label>
								<input class="form-control" value="{!! $actividadesMostrar->nombre_accion_especifica !!}" readonly type="text" name="nombre_accion_especifica" id="nombre_accion_especifica" placeholder="nombre acción especifica">
						</div>
						<div class="p-1 col-md-12">
								<label class=" text-secondary" for="id_actividad">Código Actividad</label>
								<input class="form-control" value="{!! $actividadesMostrar->id_actividad !!}" readonly type="text" name="id_actividad" id="id_actividad" placeholder="código actividad">
						</div>
						<div class="p-1 col-md-12">
								<label class=" text-secondary" for="nombre_actividad">Nombre Actividad</label>
								<input class="form-control" value="{!! $actividadesMostrar->nombre_actividad !!}" type="text" name="nombre_actividad" id="nombre_actividad" placeholder="nombre actividad">
						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-actividades" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
