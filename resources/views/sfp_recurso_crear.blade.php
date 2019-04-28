@extends('layouts.layout')
@section('titulo', 'Recursos Agregar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Registrar Recursos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-4">
							<label class=" text-secondary" for="id_recurso">Código</label>
 							<input class="form-control" type="text" name="id_recurso" id="id_recurso" placeholder="código del recurso">
 						</div>
 						<div class="p-1 col-md-8">
							<label class=" text-secondary" for="nombre_recurso">Nombre del recurso</label>
 							<input class="form-control" type="text" name="nombre_recurso" id="nombre_recurso" placeholder="nombre del recurso">
 						</div>
						<div class="p-1 col-md-6">
							 <label class=" text-secondary" for="id_parte">Nro. de partes</label>
						 	 <select class="form-control" name="id_parte" id="id_parte">
								 @foreach($partes as $parte)
										<option value="{!! $parte->id_parte !!}">{{ $parte->id_parte.' '.$parte->nombre_parte }}</option>
								 @endforeach
								</select>
						</div>
						<div class="p-1 col-md-6">
							 <label class=" text-secondary" for="id_unimed">Unidad de medidas</label>
						 	 <select class="form-control" name="id_unimed" id="id_unimed">
								  @foreach($unidadmedidas as $unidadmedida)
										<option value="{!! $unidadmedida->id_unimed !!}">{{ $unidadmedida->id_unimed.' '.$unidadmedida->nombre_unidad }}</option>
									@endforeach
								</select>
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="precio">Precio del recurso</label>
							<input class="form-control" type="text" name="precio" id="precio" placeholder="precio del recurso">
						</div>
						<div class="p-1 col-md-9">
							 <label class=" text-secondary" for="id_plancuenta">Plan de cuentas</label>
						 	 <select class="form-control" name="id_plancuenta" id="id_plancuenta">
								  @foreach($plancuentas as $plancuenta)
										<option value="{!! $plancuenta->id_plancuenta !!}">{{ $plancuenta->id_plancuenta.' '.$plancuenta->nombre_cuenta }}</option>
									@endforeach
								</select>
						</div>
						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="id_cuentacontable">Cuenta contable</label>
							<input class="form-control" type="text" name="id_cuentacontable" id="id_cuentacontable" placeholder="cuenta contable">
						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-recursos" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
