@extends('layouts.layout')
@section('titulo', 'Plan de Cuentas Agregar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Registrar Plan Cuentas <i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-4">
							<label class=" text-secondary" for="id_plancuenta">Código</label>
 							<input class="form-control" type="text" name="id_plancuenta" id="id_plancuenta" placeholder="código plan cuenta">
 						</div>
 						<div class="p-1 col-md-8">
							<label class=" text-secondary" for="nombre_cuenta">Nombre Plan de Cuenta</label>
 							<input class="form-control" type="text" name="nombre_cuenta" id="nombre_cuenta" placeholder="nombre plan de cuenta">
 						</div>

 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-plancuentas" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
