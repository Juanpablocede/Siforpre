@extends('layouts.layout')
@section('titulo', 'Accion Especifica Mostrar')
@section('content')

<div class="row w-100 mt-4 justify-content-center">
	<div class="prueba col-md-8 card card-content">
		<div class="row show-details mb-4">
			<div class="col-12 pl-0 mb-1">
				<h4>Mostrar Acciones Especificas</h4>
			</div>
			<div class="p-1 col-md-9">
				<label class="text-secondary" for="id_empresa">Empresa</label>
				<p>{!! $accionesMostrar->id_empresa !!} {!! $accionesMostrar->nombre_empresa !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
				<p>{!! $accionesMostrar->ano_presupuesto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_proyecto">Proyecto</label>
				<p>{!! $accionesMostrar->id_proyecto !!} {!! $accionesMostrar->nombre_proyecto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_unidad_admin">Unidad Administrativa</label>
				<p>{!! $accionesMostrar->id_unidad_admin !!} {!! $accionesMostrar->nombre_unidad_admin !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_unidad_admin">Acción Especifica</label>
				<p>{!! $accionesMostrar->id_accion_especifica !!} {!! $accionesMostrar->nombre_accion_especifica !!}</p>
			</div>
			@include('error')

			@if(session('status'))
					<div class="alert alert-success" role="alert">
							{{ session('status') }}
					</div>
			@endif
		</div>
		<div class="row justify-content-center">
			<div class="col-md-4">
					<a href="/sfp-accionespecificas" class="form-control btn btn-primary" name="salir" id="salir">Salir
						<i class="fas fa-sign-out-alt"></i>
					</a>
			</div>
		</div>
	</div>
</div>
@endsection
