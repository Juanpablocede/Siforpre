@extends('layouts.layout')
@section('titulo', 'Actividades Mostrar')
@section('content')

<div class="row w-100 mt-4 justify-content-center">
	<div class="prueba col-md-10 card card-content">
		<div class="row show-details mb-4">
			<div class="col-12 pl-0 mb-1">
				<h4>Mostrar Asignación de Recursos</h4>
			</div>
			<div class="p-1 col-md-9">
				<label class="text-secondary" for="id_empresa">Empresa</label>
				<p>{!! $recursosMostrar->id_empresa !!} {!!$recursosMostrar->nombre_empresa !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
				<p>{!! $recursosMostrar->ano_presupuesto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_proyecto">Proyecto</label>
				<p>{!! $recursosMostrar->id_proyecto !!} {!! $recursosMostrar->nombre_proyecto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_unidad_admin">Unidad Administrativa</label>
				<p>{!! $recursosMostrar->id_unidad_admin !!} {!! $recursosMostrar->nombre_unidad_admin !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_accion_especifica">Acción Especifica</label>
				<p>{!! $recursosMostrar->id_accion_especifica !!} {!! $recursosMostrar->nombre_accion_especifica !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_actividad">Actividades</label>
				<p>{!! $recursosMostrar->id_actividad !!} {!! $recursosMostrar->nombre_actividad !!}</p>
			</div>
			<div class="p-1 col-md-10">
				<label class="text-secondary" for="id_fuente_financiamiento">Fuente Financiamiento</label>
				<p>{!! $recursosMostrar->id_fuente_financiamiento !!} {!! $recursosMostrar->nombre_fuente_financiamiento !!}</p>
			</div>
			<div class="p-1 col-md-2">
				<label class="text-secondary" for="tipo">Tipo</label>
				<p>{!! $recursosMostrar->tipo !!}</p>
			</div>
			<div class="p-1 col-md-10">
				<label class="text-secondary" for="id_unidad_admin">Recurso</label>
				<p>{!! $recursosMostrar->id_recurso !!} {!! $recursosMostrar->nombre_recurso !!}</p>
			</div>
			<div class="p-1 col-md-2">
				<label class="text-secondary" for="precio_recurso">Precio</label>
				<p>{!! number_format($recursosMostrar->precio_recurso, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-10">
				<label class="text-secondary" for="id_plancuenta">Plan de Cuenta</label>
				<p>{!! $recursosMostrar->id_plancuenta !!} {!! $recursosMostrar->nombre_cuenta !!}</p>
			</div>
			<div class="p-1 col-md-2">
				<label class="text-secondary" for="escenario">Escenario</label>
				<p>{!! $recursosMostrar->escenario !!}</p>
			</div>
			<div class="p-1 col-md-3">
			<label class="text-secondary" for="cantidad_enero">Enero</label>
				<p>{!! number_format($recursosMostrar->cantidad_enero, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_febrero">Febrero</label>
				<p>{!! number_format($recursosMostrar->cantidad_febrero, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_marzo">Marzo</label>
				<p>{!! number_format($recursosMostrar->cantidad_marzo, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_abril">Abril</label>
				<p>{!! number_format($recursosMostrar->cantidad_abril, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_mayo">Mayo</label>
				<p>{!! number_format($recursosMostrar->cantidad_mayo, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_junio">Junio</label>
				<p>{!! number_format($recursosMostrar->cantidad_junio, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_julio">Julio</label>
				<p>{!! number_format($recursosMostrar->cantidad_julio, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_agosto">Agosto</label>
				<p>{!! number_format($recursosMostrar->cantidad_agosto, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_septiembre">Septiembre</label>
				<p>{!! number_format($recursosMostrar->cantidad_septiembre, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_octubre">Octubre</label>
				<p>{!! number_format($recursosMostrar->cantidad_octubre, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_noviembre">Noviembre</label>
				<p>{!! number_format($recursosMostrar->cantidad_noviembre, 2, ",", ".") !!}</p>
			</div>
			<div class="p-1 col-md-3">
				<label class="text-secondary" for="cantidad_diciembre">Diciembre</label>
				<p>{!! number_format($recursosMostrar->cantidad_diciembre, 2, ",", ".") !!}</p>
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
					<a href="/sfp-asignacionrecursos" class="form-control btn btn-primary" name="salir" id="salir">Salir
						<i class="fas fa-sign-out-alt"></i>
					</a>
			</div>
		</div>
	</div>
</div>
@endsection
