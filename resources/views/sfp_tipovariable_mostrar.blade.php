@extends('layouts.layout')
@section('titulo', 'Tipo Variable Mostrar')
@section('content')

<form class="" method="post">

			<div class="row w-100 mt-4 justify-content-center">
				<div class="prueba col-md-8 card card-content">
					<div class="row show-details mb-4">
						<div class="col-12 pl-0 mb-1">
							<h4>Mostrar Tipos de Variables</h4>
						</div>
						<div class="col-6">
							<label class="text-secondary">Código</label>
							<p>{!! $tipovariable->id_tipovariable !!}</p>
						</div>
						<div class="col-12">
								<label class="text-secondary">Nombre de la Variable</label>
								<h2 class="text-primary">{!! $tipovariable->nombre_variable !!}</h2>
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
								<a href="/sfp-tipovariables" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
								</a>
						</div>
					</div>
				</div>
			</div>
</form>
@endsection
