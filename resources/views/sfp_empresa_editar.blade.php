@extends('layouts.layout')
@section('titulo', 'Empresa Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Empresa <i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
 						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="nombre_empresa">Nombre de la empresa</label>
 							<input class="form-control" value="{!! $empresa->nombre_empresa !!}" type="text" name="nombre_empresa" id="nombre_empresa" placeholder="nombre empresa">
 						</div>
 						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="direccion_empresa">Dirección</label>
 							<input class="form-control" value="{!! $empresa->direccion_empresa !!}" type="text" name="direccion_empresa" id="direccion_empresa" placeholder="dirección">
 					  </div>
 						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="rif">RIF</label>
 							<input class="form-control" value="{!! $empresa->rif !!}" type="text" name="rif" id="rif" placeholder="número de rif">
 						</div>
 						<div class="p-1 col-md-6">
							<label class=" text-secondary" for="telefonos">Número de teléfono</label>
 							<input class="form-control" value="{!! $empresa->telefonos !!}" type="text" name="telefonos" id="telefonos" placeholder="número de telefono">
 						</div>
 						<div class="p-1 col-md-12">
							<label class=" text-secondary" for="persona_contacto">Persona de contacto</label>
 							<input class="form-control" value="{!! $empresa->persona_contacto !!}" type="text" name="persona_contacto" id="persona_contacto" placeholder="persona contacto">
 						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-empresas" class="form-control btn btn-primary" name="salir" id="salir">Salir
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