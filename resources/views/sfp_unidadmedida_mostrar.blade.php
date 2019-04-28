@extends('layouts.layout')
@section('titulo', 'Unidad de Medida Mostrar')
@section('content')

<form class="" method="post">

			<div class="row w-100 mt-4 justify-content-center">
				<div class="prueba col-md-8 card card-content">
					<div class="row show-details mb-4">
						<div class="col-12 pl-0 mb-1">
							<h4>Mostrar Unidad de Medidas</h4>
						</div>
						<div class="col-6">
							<label class="text-secondary">Código</label>
							<p>{!! $unidadmedida->id_unimed !!}</p>
						</div>
						<div class="col-12">
							<label class="text-secondary">Descripciòn Unidad de Medida</label>
							<h2 class="text-primary">{!! $unidadmedida->nombre_unidad !!} <i class="fa text-primary fa-briefcase" aria-hidden="true"></i></h2>
						</div>
						@include('error')

	 					@if(session('status'))
		 					<div class="alert alert-success" role="alert">
		 							{{ session('status') }}
		 					</div>
	 					@endif
					</div>
					<div class="row justify-content-center">
						<div class="col-md-4">
								<a href="/sfp-unidadmedidas" class="form-control btn btn-primary" name="salir" id="salir">Salir
									<i class="fas fa-sign-out-alt"></i>
								</a>
						</div>
					</div>
				</div>
			</div>
</form>
@endsection
