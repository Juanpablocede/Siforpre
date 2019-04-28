@extends('layouts.layout')
@section('titulo', 'Fuentes Financiamientos Agregar')
@section('content')

<form class="" method="post">
			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
									Registrar Fuentes de Financiamientos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="id_empresa">Código Empresa</label>
								<select class="form-control" type="text" name="id_empresa" id="id_empresa">
										@foreach($empresas as $empresa)
										<option value="{!! $empresa->id_empresa !!}">{{ $empresa->id_empresa.' '.$empresa->nombre_empresa }}</option>
										@endforeach
									</select>
 						</div>
 						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="ano_presupuesto">Año Presupuesto</label>
	 							<input class="form-control" type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año presupuesto">
 						</div>
						<div class="p-1 col-md-4">
								<label class=" text-secondary" for="id_fuente_financiamiento">Código Fuente</label>
	 							<input class="form-control" type="text" name="id_fuente_financiamiento" id="id_fuente_financiamiento" placeholder="código fuente">
 						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="nombre_fuente_financiamiento">Nombre Fuente Financiamiento</label>
								<input class="form-control" type="text" name="nombre_fuente_financiamiento" id="nombre_fuente_financiamiento" placeholder="nombre fuente financiamiento">
						</div>
						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-fuentefinanciamientos" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
