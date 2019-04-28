<!DOCTYPE html>
<html lang="en">
	<head>
		<title>sfp_proyecto</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/estilos.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	</head>
	<body>
		<form  method="POST">
			<header>

			</header>
			<div class="row w-100">
				<div class="col-12 vista01">
				</div>

			</div>

			<div class="row w-100">
				<div class="col-4">
				</div>
				<div class="col-1">
					<img class="imagenlogo" src="../imagenes/maderas03.png">
				</div>
				<div class="col-3 vista02">
					<h2>Registro de Proyectos</h2>
				</div>
				<div class="col-4">
				</div>
			</div>
			<div class="row w-100">
				<div class="col-4">
				</div>
				<div class="col-4 vista03">
					<div class="row w-100">
						<div class="col-12">
							<input class="form-control" type="text" name="id_empresa" id="id_empresa" placeholder="código empresa">
						</div>
					</div>

					<div class="row w-100">
						<div class="col-12">
							<input class="form-control" type="text" name="ano_presupuesto" id="ano_presupuesto" placeholder="año del presupuesto">
						</div>
					</div>

					<div class="row w-100">
						<div class="col-12">
							<input class="form-control" type="text" name="id_proyecto" id="id_proyecto" placeholder="código del proyecto">
						</div>
					</div>

					<div class="row w-100">
						<div class="col-12">
							<input class="form-control" type="text" name="nombre_proyecto" id="nombre_proyecto" placeholder="nombre del proyecto">
						</div>
					</div>

					<div class="row w-100">
						<div class="col-6">
							<select class="form-control" name="tipo" id="tipo">
								<option value="A" select>Acción Centralizada</option>
								<option value="P">Proyecto</option>
							</select>
						</div>
					</div>

					<div class="row w-100">
						<div class="col-6">
							<button class="form-control btn btn-primary" type="submit" name="guardar" id="guardar" >Guardar</button>
						</div>
						<input type="hidden" name="_token" value="{!! csrf_token() !!}">
					</div>

					@if(session('status'))
					<div class="alert alert-success" role="alert">
							{{ session('status') }}
					</div>
					@endif

				</div>
				<div class="col-4">
				</div>
			</div>
		</form>
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="../js/validaciones.js"></script>
	</body>
</html>
