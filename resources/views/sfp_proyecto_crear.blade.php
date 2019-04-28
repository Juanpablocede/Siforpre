@extends('layouts.layout')
@section('titulo', 'Proyecto Agregar')
@section('content')

<form class="" method="post">
			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
									Registrar Proyectos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
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
								<label class=" text-secondary" for="id_proyecto">Código Proyecto</label>
	 							<input class="form-control" type="text" name="id_proyecto" id="id_proyecto" placeholder="código proyecto">
 						</div>
						<div class="p-1 col-md-8">
								<label class=" text-secondary" for="nombre_proyecto">Nombre Proyecto</label>
								<input class="form-control" type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre proyecto">
						</div>
						<div class="p-1 col-md-12">
							  <label class=" text-secondary" for="tipo">Tipo Proyecto</label>
								<select class="form-control" name="tipo" id="tipo">
									<option value="A" select>Acción Centralizada</option>
									<option value="P">Proyecto</option>
								</select>
						</div>
						<div class="col-md-6">
 								<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar
									<i class="fas fa-save"></i>
								</button>
 						</div>
 						<div class="col-md-6">
 								<a href="/sfp-proyectos" class="form-control btn btn-primary" name="salir" id="salir">Salir
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
