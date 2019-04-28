@extends('layouts.layout')
@section('titulo', 'Acción Especifica Agregar')
@section('content')

<form class="" method="post">
			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
									Registrar Acciones Especificas<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="id_unidad_admin">Unidad Administrativa</label>
							<select class="form-control centroCosto" type="text" value="" name="id_unidad_admin" id="id_unidad_admin">
								@foreach($unidades as $unidad)
									<option value="{!! $unidad->id_unidad_admin !!}">{{ $unidad->id_proyecto.' '.$unidad->id_unidad_admin.' '.$unidad->nombre_unidad_admin }}</option>
								@endforeach
							</select>
		 				</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="id_empresa">Código Empresa</label>
							<input class="form-control" value="{!! $unidad->id_empresa !!}" readonly type="text" name="id_empresa" id="id_empresa" placeholder="codigo empresa">
						</div>
						<div class="p-1 col-md-6">
							<label class="text-secondary" for="nombre_empresa">Nombre Empresa</label>
							<input class="form-control" value="{!! $unidad->nombre_empresa !!}" readonly type="text" name="nombre_empresa" id="nombre_empresa" placeholder="nombre empresa">
						</div>
						<div class="p-1 col-md-3">
							<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
							<input class="form-control" value="{!! $unidad->ano_presupuesto !!}" readonly type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año presupuesto">
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary" for="id_proyecto">Código Proyecto</label>
							<input class="form-control" value="{!! $unidad->id_proyecto !!}" readonly  type="text" name="id_proyecto" id="id_proyecto" placeholder="código proyecto">
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_proyecto">Nombre Proyecto</label>
							<input class="form-control" value="{!! $unidad->nombre_proyecto !!}" readonly type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre proyecto">
						</div>
						<div class="p-1 col-md-12">
								<label class=" text-secondary" for="id_accion_especifica">Código Acción Especifica</label>
								<input class="form-control" type="text" name="id_accion_especifica" id="id_accion_especifica" placeholder="código acción especifica">
						</div>
						<div class="p-1 col-md-12">
								<label class=" text-secondary" for="nombre_accion_especifica">Nombre Acción Especifica</label>
								<input class="form-control" type="text" name="nombre_accion_especifica" id="nombre_accion_especifica" placeholder="nombre acción especifica">
						</div>
						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-accionespecificas" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
