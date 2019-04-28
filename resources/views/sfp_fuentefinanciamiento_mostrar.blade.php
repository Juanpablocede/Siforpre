@extends('layouts.layout')
@section('titulo', 'Fuentes Financiamientos Mostrar')
@section('content')

<div class="row w-100 mt-4 justify-content-center">
	<div class="prueba col-md-8 card card-content">
		<div class="row show-details mb-4">
			<div class="col-12 pl-0 mb-1">
				<h4>Mostrar Fuentes Financiamientos</h4>
			</div>
			<div class="col-4">
				<label class="text-secondary">Año Presupuesto</label>
				<p>{!! $fuenteMostrar->ano_presupuesto !!}</p>
			</div>
			<div class="col-8">
				<label class="text-secondary">Empresa</label>
				<p>{!! $fuenteMostrar->id_empresa !!} {!! $fuenteMostrar->nombre_empresa !!}</p>
			</div>
			<div class="col-4">
				<label class="text-secondary">Código Fuente</label>
				<p>{!! $fuenteMostrar->id_fuente_financiamiento !!}</p>
			</div>
			<div class="col-8">
				<label class="text-secondary">Nombre Fuente Financiamiento</label>
				<p>{!! $fuenteMostrar->nombre_fuente_financiamiento !!}</p>
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
					<a href="/sfp-fuentefinanciamientos" class="form-control btn btn-primary" name="salir" id="salir">Salir
						<i class="fas fa-sign-out-alt"></i>
					</a>
			</div>
		</div>
	</div>
</div>
@endsection
