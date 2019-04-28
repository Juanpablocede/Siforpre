@extends('layouts.layout')
@section('titulo', 'Variables Economicas Agregar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Registrar Variables Económicas<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-2">
							<label class=" text-secondary" for="id_variable">Código</label>
 							<input class="form-control" type="text" name="id_variable" id="id_variable" placeholder="código variable económica">
 						</div>
						<div class="p-1 col-md-8">
							 <label class=" text-secondary" for="id_tipovariable">Tipo variable económica</label>
						 	 <select class="form-control" name="id_tipovariable" id="id_tipovariable">
								  @foreach($tipovariables as $tipovariable)
										<option value="{!! $tipovariable->id_tipovariable !!}">{{ $tipovariable->id_tipovariable.' '.$tipovariable->nombre_variable }}</option>
									@endforeach
								</select>
						</div>
						<div class="p-1 col-md-2">
							<label class=" text-secondary" for="ano_presupuesto">Año</label>
 							<input class="form-control" type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año presupuesto">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="enero">Enero</label>
 							<input class="form-control" type="text" name="enero" id="enero" placeholder="enero">
 						</div>
 						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="febrero">Febrero</label>
 							<input class="form-control" type="text" name="febrero" id="febrero" placeholder="febrero">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="marzo">Marzo</label>
 							<input class="form-control" type="text" name="marzo" id="marzo" placeholder="marzo">
 						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="abril">Abril</label>
							<input class="form-control" type="text" name="abril" id="abril" placeholder="abril">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="mayo">Mayo</label>
							<input class="form-control" type="text" name="mayo" id="mayo" placeholder="mayo">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="junio">Junio</label>
							<input class="form-control" type="text" name="junio" id="junio" placeholder="junio">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="julio">Julio</label>
							<input class="form-control" type="text" name="julio" id="julio" placeholder="julio">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="agosto">Agosto</label>
							<input class="form-control" type="text" name="agosto" id="agosto" placeholder="agosto">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="septiembre">Septiembre</label>
							<input class="form-control" type="text" name="septiembre" id="septiembre" placeholder="septiembre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="octubre">Octubre</label>
							<input class="form-control" type="text" name="octubre" id="octubre" placeholder="octubre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="noviembre">Noviembre</label>
							<input class="form-control" type="text" name="noviembre" id="noviembre" placeholder="noviembre">
						</div>
						<div class="p-1 col-md-3">
							<label class=" text-secondary" for="diciembre">Diciembre</label>
							<input class="form-control" type="text" name="diciembre" id="diciembre" placeholder="diciembre">
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
