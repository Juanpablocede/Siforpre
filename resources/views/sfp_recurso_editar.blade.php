@extends('layouts.layout')
@section('titulo', 'Recursos Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Recursos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
 						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="nombre_recurso">Nombre recurso</label>
 							<input class="form-control" value="{!! $recurso->nombre_recurso !!}" type="text" name="nombre_recurso" id="nombre_recurso" placeholder="nombre del recurso">
 						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="id_parte">Nro. de Partes</label>
							<input class="form-control" value="{!! $recurso->id_parte !!}" type="text" name="id_parte" id="id_parte" placeholder="nro. de parte">
						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="id_unimed">Unidad de Medida</label>
							<input class="form-control" value="{!! $recurso->id_unimed !!}" type="text" name="id_unimed" id="id_unimed" placeholder="unidad medida">
						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="precio">Precio</label>
							<input class="form-control" value="{!! $recurso->precio !!}" type="text" name="precio" id="precio" placeholder="precio recurso">
						</div>
						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="id_plancuenta">Plan de Cuenta</label>
							<input class="form-control" value="{!! $recurso->id_plancuenta !!}" type="text" name="id_plancuenta" id="id_plancuenta" placeholder="plan de cuenta">
						</div>
						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="id_cuentacontable">Cuenta Contable</label>
							<input class="form-control" value="{!! $recurso->id_cuentacontable !!}" type="text" name="id_cuentacontable" id="id_cuentacontable" placeholder="cuenta contable">
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
