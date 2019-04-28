@extends('layouts.layout')
@section('titulo', 'Proyecto Editar')
@section('content')

<form class="" method="post">

			<div class="row w-100 justify-content-center">
				<div class="col-md-8 card card-content">
					<div class="row">
						<div class="col-12 pl-0 mb-1">
							<h4>
								Editar Proyectos<i class="fa text-primary fa-briefcase" aria-hidden="true"></i>
							</h4>
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary">Año Presupuesto</label>
							<p>{!! $proyectoMostrar->ano_presupuesto !!}</p>
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary">Empresa</label>
							<p>{!! $proyectoMostrar->id_empresa !!} {!! $proyectoMostrar->nombre_empresa !!}</p>
						</div>
						<div class="p-1 col-md-4">
							<label class="text-secondary">Código Proyecto</label>
							<p>{!! $proyectoMostrar->id_proyecto !!}</p>
						</div>
						<div class="p-1 col-md-8">
							<label class="text-secondary">Nombre Proyecto</label>
 							<input class="form-control" value="{!! $proyectoMostrar->nombre_proyecto !!}" type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre proyecto">
 						</div>
						<div class="p-1 col-md-12">
								<input type="hidden" id="tipo-proyecto" value="{!! $proyectoMostrar->tipo !!}">
								<select class="form-control" name="tipo" id="tipo">
									<option value="A">Acción Centralizada</option>
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
