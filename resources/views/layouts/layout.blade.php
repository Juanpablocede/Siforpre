<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport"
	content="width=device-width, initial-scale=1, user-scalable=yes">

	<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

	<link rel="stylesheet" type="text/css" href="../../css/estilos.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilomenu01.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/override.css">
	<link rel="stylesheet" type="text/css" href="../../css/easy-autocomplete.min.css">
	<link rel="shortcut icon" href="../../imagenes/siforpre-logo.png">

	<!--
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	!-->

	<title>@yield('titulo')</title>
</head>
<body id="app">
	<div id="preloaders" class="preloader"></div>
	<!--<div class="row w-100 cabecera">
		<div class="col-md-2">
			<img class="imagencabecera" src="../../imagenes/maderas03.png">
		</div>
		<div class="col-md-10">
			<h1 class="titulocabecera">Sistema de Formulaciòn Presupuestaria SIFORPRE</h1>
		</div>
	</div>
	<div class="row w-100 cabecera">
		<div class="col-md-2">
			<img class="imagencabecera" src="../../imagenes/siforpre-logo.png">
		</div>
		<div class="col-md-10">
			<h1 class="titulocabecera">Sistema de Formulación Presupuestaria SIFORPRE</h1>
		</div>
	</div>-->
	<div class="row w-100">
		<div class="col-2 fixed-left p-0" id="menu">
			<div class="p-1">
					<img width="150px" src="../../imagenes/siforpre-logo.png">
			</div>
			<div id="accordion">
			    <div class="menu-header p-1" id="datosBasicos">
									<p class="menu-title mb-1 pl-1">Deficiones</p>
			      <h5 class="mb-0">
			        <button class="btn btn-link sub-menu-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Datos Básicos
			        </button>
			      </h5>
			    </div>

			    <div id="collapseOne" class="collapse p-3" aria-labelledby="datosBasicos" data-parent="#accordion">
							<ul class="sub-menu">
								<li><a class="sub-menu-item" href="/sfp-empresas">Empresas</a></li>
                <li><a class="sub-menu-item" href="/sfp-plancuentas">Plan de Cuentas</a></li>
                <li><a class="sub-menu-item" href="/sfp-centrocostos">Centro de Costo</a></li>
                <li><a class="sub-menu-item" href="/sfp-partes">Número de Partes</a></li>
                <li><a class="sub-menu-item" href="/sfp-unidadmedidas">Unidad de Medida</a></li>
                <li><a class="sub-menu-item" href="/sfp-recursos">Recursos</a></li>
                <li><a class="sub-menu-item" href="/sfp-tipovariables">Tipos de Variables</a></li>
                <li><a class="sub-menu-item" href="/sfp-variableeconomicas">Variables Economicas</a></li>
							</ul>
			    </div>

			    <div class="menu-header p-1" id="estructura-program">
			      <h5 class="mb-0">
			        <button class="btn btn-link sub-menu-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Estructura Programática
			        </button>
			      </h5>
			    </div>
			    <div id="collapseTwo" class="collapse p-3" aria-labelledby="estructura-program" data-parent="#accordion">
						<ul class="sub-menu">
							<li><a class="sub-menu-item" href="/sfp-proyectos">Proyectos</a></li>
							<li><a class="sub-menu-item" href="/sfp-unidadadministrativas">Unidades Administrativas</a></li>
							<li><a class="sub-menu-item" href="/sfp-accionespecificas">Acciones Especificas</a></li>
							<li><a class="sub-menu-item" href="/sfp-actividades">Actividades</a></li>
							<li><a class="sub-menu-item" href="/sfp-fuentefinanciamientos">Fuente de Financiamiento</a></li>
						</ul>
			    </div>
					<br>
					<p class="menu-title pl-1 mb-1">Procesos</p>
			    <div class="menu-header" id="asignacion">
			      <h5 class="mb-0">
			        <button class="btn btn-link sub-menu-link collapsed p-3" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Asignación
			        </button>
			      </h5>
			    </div>
			    <div id="collapseThree" class="collapse p-3" aria-labelledby="asignacion" data-parent="#accordion">
						<ul class="sub-menu">
							<li><a class="sub-menu-item" href="/sfp-asignacionrecursos">Recursos</a></li>
							<li><a class="sub-menu-item" href="">Personal</a></li>
						</ul>
			    </div>

					<div class="menu-header" id="formulacion">
			      <h5 class="mb-0">
			        <button class="btn btn-link sub-menu-link collapsed p-3" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Formulación
			        </button>
			      </h5>
			    </div>
			    <div id="collapseFour" class="collapse p-3" aria-labelledby="formulacion" data-parent="#accordion">
						<ul class="sub-menu">
							<li><a class="sub-menu-item" href="">Consolidar</a></li>
							<li><a class="sub-menu-item" href="">Aprobar</a></li>
							<li><a class="sub-menu-item" href="">Migrar</a></li>
						</ul>
			    </div>

					<br>
					<p class="menu-title pl-1 mb-1">Herramientas</p>
					<div class="menu-header" id="Mantenimiento">
						<h5 class="mb-0">
							<button class="btn btn-link sub-menu-link collapsed p-3" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Mantenimiento
							</button>
						</h5>
					</div>
					<div id="collapseFive" class="collapse p-3" aria-labelledby="Mantenimiento" data-parent="#accordion">
						<ul class="sub-menu">
							<li><a class="sub-menu-item" href="">Reconstrucción Montos</a></li>
	            <li><a class="sub-menu-item" href="">Copiar Escanarios</a></li>
	            <li><a class="sub-menu-item" href="">Eliminar Escanarios</a></li>
						</ul>
					</div>

					<div class="menu-header" id="Reportes">
						<h5 class="mb-0">
							<button class="btn btn-link sub-menu-link collapsed p-3" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
								<i class="fa fa-caret-right" aria-hidden="true"></i>
								Reportes
							</button>
						</h5>
					</div>
					<div id="collapseSix" class="collapse p-3" aria-labelledby="Reportes" data-parent="#accordion">
							<ul class="sub-menu">
		            <li><a class="sub-menu-item" href="">Reportes1</a></li>
		            <li><a class="sub-menu-item" href="">Reportes2</a></li>
		            <li><a class="sub-menu-item" href="">Reportes3</a></li>
		            <li><a class="sub-menu-item" href="">Reportes4</a></li>
		          </ul>
					</div>

			</div>
		</div>
		<div class="col-10" id="main-content">
				@yield('content')
		</div>
	</div>


	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="../../js/jquery.easy-autocomplete.min.js"></script>


	<!--
	<script type="text/javascript" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	!-->

	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

	<script type="text/javascript" src="../../js/validaciones.js"></script>



</body>
</html>
