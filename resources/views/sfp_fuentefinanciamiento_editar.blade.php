@extends('layouts.layout')
@section('titulo', 'Fuente Financiamiento Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Fuentes Financiamientos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary">Año Presupuesto</label>
							<p value="{!! $fuenteMostrar->ano_presupuesto !!}">{!! $fuenteMostrar->ano_presupuesto !!}</p>
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary">Empresa</label>
							<p value="{!! $fuenteMostrar->id_empresa !!}">{!! $fuenteMostrar->id_empresa !!} {!! $fuenteMostrar->nombre_empresa !!}</p>
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary">Código Fuente</label>
							<p value="{!! $fuenteMostrar->id_fuente_financiamiento !!}">{!! $fuenteMostrar->id_fuente_financiamiento !!}</p>
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary" for="nombre_fuente_financiamiento">Nombre Fuente Financiamiento</label>
 							<input class="form-control" value="{!! $fuenteMostrar->nombre_fuente_financiamiento !!}" type="text" name="nombre_fuente_financiamiento" id="nombre_fuente_financiamiento" placeholder="nombre fuente financiamiento">
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
