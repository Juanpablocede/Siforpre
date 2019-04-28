@extends('layouts.layout')
@section('titulo', 'Unidad Medida Mostrar')
@section('content')

<div class="row w-100 mt-4 justify-content-center">
	<div class="prueba col-md-8 card card-content">
		<div class="row show-details mb-4">
			<div class="col-12 pl-0 mb-1">
				<h4>Mostrar Unidades Administrativas</h4>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_empresa">Empresa</label>
				<p>{!! $unidadMostrar->id_empresa !!} {!! $unidadMostrar->nombre_empresa !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="ano_presupuesto">Año Presupuesto</label>
				<p>{!! $unidadMostrar->ano_presupuesto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_proyecto">Proyecto</label>
				<p>{!! $unidadMostrar->id_proyecto !!} {!! $unidadMostrar->nombre_proyecto !!}</p>
			</div>
			<div class="p-1 col-md-12">
				<label class="text-secondary" for="id_unidad_admin">Unidad Administrativa</label>
				<p>{!! $unidadMostrar->id_unidad_admin !!} {!! $unidadMostrar->nombre_unidad_admin !!}</p>
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
					<a href="/sfp-unidadadministrativas" class="form-control btn btn-primary" name="salir" id="salir">Salir
						<i class="fas fa-sign-out-alt"></i>
					</a>
			</div>
		</div>
	</div>
</div>
@endsection
