@extends('layouts.layout')
@section('titulo', 'Variable Económina Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Variables Económicas<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>

						<div class="col-12 pl-0 mb-1">
									<label class="class="text-primary"">Nombre Variable Económica</label>
									<h3>{!! $variableEconomica->nombre_variable !!}</h3>
						</div>

 						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="enero">Enero</label>
 							<input class="form-control" value="{!! $variableEconomica->enero !!}" type="text" name="enero" id="enero" placeholder="enero">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="febrero">Febrero</label>
 							<input class="form-control" value="{!! $variableEconomica->febrero !!}" type="text" name="febrero" id="febrero" placeholder="febrero">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="marzo">Marzo</label>
 							<input class="form-control" value="{!! $variableEconomica->marzo !!}" type="text" name="marzo" id="marzo" placeholder="marzo">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="abril">Abril</label>
 							<input class="form-control" value="{!! $variableEconomica->abril !!}" type="text" name="abril" id="abril" placeholder="abril">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="mayo">Mayo</label>
 							<input class="form-control" value="{!! $variableEconomica->mayo !!}" type="text" name="mayo" id="mayo" placeholder="mayo">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="junio">Junio</label>
 							<input class="form-control" value="{!! $variableEconomica->junio !!}" type="text" name="junio" id="junio" placeholder="junio">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="julio">Julio</label>
 							<input class="form-control" value="{!! $variableEconomica->julio !!}" type="text" name="julio" id="julio" placeholder="julio">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="agosto">Agosto</label>
 							<input class="form-control" value="{!! $variableEconomica->agosto !!}" type="text" name="agosto" id="agosto" placeholder="agosto">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="septiembre">Septiembre</label>
							<input class="form-control" value="{!! $variableEconomica->septiembre !!}" type="text" name="septiembre" id="septiembre" placeholder="septiembre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="octubre">Octubre</label>
							<input class="form-control" value="{!! $variableEconomica->octubre !!}" type="text" name="octubre" id="octubre" placeholder="octubre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="noviembre">Noviembre</label>
							<input class="form-control" value="{!! $variableEconomica->noviembre !!}" type="text" name="noviembre" id="noviembre" placeholder="noviembre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="diciembre">Diciembre</label>
							<input class="form-control" value="{!! $variableEconomica->diciembre !!}" type="text" name="diciembre" id="diciembre" placeholder="diciembre">
						</div>
 						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-variableeconomicas" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
