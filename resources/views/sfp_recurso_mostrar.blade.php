@extends('layouts.layout')
@section('titulo', 'Recursos Mostrar')
@section('content')

<form class="" method="post">

			<div class="row w-100 mt-4 justify-content-center">
				<div class="prueba col-md-8 card card-content">
					<div class="row show-details mb-4">
						<div class="col-12 pl-0 mb-1">
							<h4>Mostrar Recursos</h4>
						</div>
						<div class="p-1 col-md-4">
							<label class=" text-secondary" for="id_recurso">Código</label>
 							<p>{!! $recursoMostrar->id_recurso !!}</p>
 						</div>
 						<div class="p-1 col-md-8">
							<label class=" text-secondary" for="nombre_recurso">Nombre del recurso</label>
 							<p>{!! $recursoMostrar->nombre_recurso !!}</p>
 						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="id_parte">Nro. de Partes</label>
							<p>{!! $recursoMostrar->id_parte !!} {!! $recursoMostrar->nombre_parte !!}</p>
						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="id_unimed">Unidad de Medidas</label>
							<p>{!! $recursoMostrar->id_unimed !!} {!! $recursoMostrar->nombre_unidad !!}</p>
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="precio">Precio del recurso</label>
							<p>{!! $recursoMostrar->precio !!}</p>
						</div>
						<div class="p-1 col-md-9">
							<label class=" text-secondary" for="id_plancuenta">Plan de cuenta</label>
							<p>{!! $recursoMostrar->id_plancuenta !!} {!! $recursoMostrar->nombre_cuenta !!}</p>
						</div>
						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="id_cuentacontable">Cuenta contable</label>
							<p>{!! $recursoMostrar->id_cuentacontable !!}</p>
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
								<a href="/sfp-recursos" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
								</a>
						</div>
					</div>
				</div>
			</div>
</form>
@endsection
