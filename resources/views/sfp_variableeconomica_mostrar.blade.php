@extends('layouts.layout')
@section('titulo', 'Variables Económicas Mostrar')
@section('content')

	<div class="row w-100 mt-4 justify-content-center">
		<div class="prueba col-md-8 card card-content">
			<div class="row show-details mb-4">
				<div class="col-12 pl-0 mb-1">
					<h4>Mostrar Variables Económicas</h4>
				</div>
				<div class="col-3">
				 		 	<label class="text-secondary">Código</label>
							<p>{!! $variableEconomica->id_variable !!}</p>
				</div>
				<div class="col-3">
							<label class="text-secondary">Año</label>
							<p>{!! $variableEconomica->ano_presupuesto !!}</p>
				</div>
				<div class="col-6">
							<label class="text-secondary">Nombre Variable Económica</label>
							<p>{!! $variableEconomica->nombre_variable !!}</p>
				</div>
				<div class="col-3">
						 	<label class="text-secondary">Enero</label>
						 	<p>{!! $variableEconomica->enero !!}</p>
				</div>
				<div class="col-3">
						 	<label class="text-secondary">Febrero</label>
						 	<p>{!! $variableEconomica->febrero !!}</p>
				</div>
				<div class="col-3">
						 	<label class="text-secondary">Marzo</label>
						 	<p>{!! $variableEconomica->marzo !!}</p>
				</div>
				<div class="col-3">
							<label class="text-secondary">Abril</label>
							<p>{!! $variableEconomica->abril !!}</p>
				</div>
				<div class="col-3">
					 		<label class="text-secondary">Mayo</label>
					 		<p>{!! $variableEconomica->mayo !!}</p>
				</div>
				<div class="col-3">
						 	<label class="text-secondary">Junio</label>
						 	<p>{!! $variableEconomica->junio !!}</p>
				</div>
				<div class="col-3">
						 	<label class="text-secondary">Julio</label>
						 	<p>{!! $variableEconomica->julio !!}</p>
				</div>
				<div class="col-3">
							<label class="text-secondary">Agosto</label>
							<p>{!! $variableEconomica->agosto !!}</p>
			  </div>
			  <div class="col-3">
					 		<label class="text-secondary">Septiembre</label>
					 		<p>{!! $variableEconomica->septiembre !!}</p>
			  </div>
			  <div class="col-3">
						 	<label class="text-secondary">Octubre</label>
						 	<p>{!! $variableEconomica->octubre !!}</p>
			  </div>
			  <div class="col-3">
						 	<label class="text-secondary">Noviembre</label>
						 	<p>{!! $variableEconomica->noviembre !!}</p>
			  </div>
			  <div class="col-3">
							<label class="text-secondary">Diciembre</label>
							<p>{!! $variableEconomica->diciembre !!}</p>
		    </div>
		  	@if(session('status'))
				<div class="alert alert-success" role="alert">
							{{ session('status') }}
				</div>
				 @endif
	   </div>
			<div class="row justify-content-center">
				<div class="col-md-4">
						<a href="/sfp-variableeconomicas" class="form-control btn btn-primary" name="salir" id="salir">Salir
							<i class="fas fa-sign-out-alt"></i>
						</a>
				</div>
			</div>
		</div>
	</div>

@endsection
