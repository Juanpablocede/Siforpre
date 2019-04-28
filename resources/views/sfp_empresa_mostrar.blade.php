@extends('layouts.layout')
@section('titulo', 'Empresa Mostrar')
@section('content')

<form class="" method="post">

			<div class="row w-100 mt-4 justify-content-center">
				<div class="prueba col-md-8 card card-content">
					<div class="row show-details mb-4">
						<div class="col-12 pl-0 mb-1">
							<h4>Mostrar Empresass</h4>
						</div>
						<div class="col-12">
								<h2 class="text-primary">{!! $empresa->nombre_empresa !!} <i class="fa text-primary fa-briefcase" aria-hidden="true"></i></h2>
								<h5 class="text-secondary">Dirección: <span class="grey-text oblique">{!! $empresa->direccion_empresa !!}</span></h5>
						</div>
						<div class="col-6">
							<label class="text-secondary">Código</label>
							<p>{!! $empresa->id_empresa !!}</p>
						</div>
						<div class="col-6">
							<label class="text-secondary">Número RIF</label>
							<p>{!! $empresa->rif !!}</p>
						</div>
						<div class="col-6">
							<label class="text-secondary">Número de teléfono</label>
							<p>{!! $empresa->telefonos !!}</p>
						</div>
						<div class="col-6">
							<label class="text-secondary">Persona de Contacto</label>
							<p>{!! $empresa->persona_contacto !!}</p>
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
								<a href="/sfp-empresas" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
								</a>
						</div>
					</div>
				</div>
			</div>
</form>
@endsection
