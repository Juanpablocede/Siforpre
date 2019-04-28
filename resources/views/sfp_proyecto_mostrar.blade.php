@extends('layouts.layout')
@section('titulo', 'Proyecto Mostrar')
@section('content')
	<div class="row w-100 mt-4 justify-content-center">
		<div class="prueba col-md-8 card card-content">
			<div class="row show-details mb-4">
				<div class="col-12 pl-0 mb-1">
					<h4>Mostrar Proyectos</h4>
				</div>
				<div class="col-4">
					<label class="text-secondary">Año Presupuesto</label>
					<p>{!! $proyectoMostrar->ano_presupuesto !!}</p>
				</div>
				<div class="col-8">
					<label class="text-secondary">Empresa</label>
					<p>{!! $proyectoMostrar->id_empresa !!} {!! $proyectoMostrar->nombre_empresa !!}</p>
				</div>
				<div class="col-4">
					<label class="text-secondary">Código Proyecto</label>
					<p>{!! $proyectoMostrar->id_proyecto !!}</p>
				</div>
				<div class="col-8">
					<label class="text-secondary">Nombre Proyecto</label>
					<p>{!! $proyectoMostrar->nombre_proyecto !!}</p>
				</div>
				<div class="col-12">
					<label class="text-secondary">Tipo Proyecto</label>
					<p>{!! $proyectoMostrar->tipo !!}</p>
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
						<a href="/sfp-proyectos" class="form-control btn btn-primary" name="salir" id="salir">Salir
							<i class="fas fa-sign-out-alt"></i>
						</a>
				</div>
			</div>
		</div>
	</div>
@endsection
