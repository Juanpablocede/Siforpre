$(document).ready(function()
{

	setTimeout(function(){
		$(".alert-success").fadeOut();
	}, 3000);

	$('#resultado').prop('disabled', true);
	var fecha = new Date();
	var ano = fecha.getFullYear();

	var select = $('#ano');
	for(var i=1900;i<=ano;i++)
	{
		select.append('<option id="any" value="'+i+'" >'+i+'</option>');
 	}

	var options = {
		url: "http://localhost:8000/sfp-acciones-especificas/buscar",

		getValue: "nombre_accion_especifica",

		list: {
			match: {
				enabled: true
			}
		}
	};

	$("#buscar-accion").easyAutocomplete(options);
	/*$("select[name=id_unidad_admin]").change(function(){
            //alert($('select[name=nombre_centrocosto]').val());
            $('input[name=nombre_unidad_admin]').val($(this).val());
        });*/

	$(".centroCosto").change(event => {
		const nombreUnidad = $("#nombre_unidad_admin");
		const optionSelected = $(".centroCosto option:selected");

		const valor = optionS
		elected.text();
		const nombreUnidadValue = valor.substr(valor.indexOf(' ')+1);
		nombreUnidad.val(nombreUnidadValue);
	});


	/*var cod = document.getElementById("accionEspecifica").text;
	alert(cod);*/


	$(".accionEspecifica").change(event => {
		const nombreUnidad = $("#id_unidad_admin");
		const optionSelected = $(".accionEspecifica option:selected");
		const valor = optionSelected.text();
		const nombreUnidadValue = valor.substr(valor.indexOf(' ')+1);
		nombreUnidad.val(nombreUnidadValue);
	});


	//Validando el primer nombre
	$('#guardar').click(function()
	{
		if ($('#primernombre').val().trim() === '')
		{
			alert('El campo primer nombre es requerido');
		} else
		{
			if(($('#primernombre').val().trim()).length > 50)
			{
				alert('La longitud del campo primer nombre no puede ser mayor de 50 caracteres');
			}
		}
	});

	//Validando el primer apellido
	$('#guardar').click(function()
	{
		if ($('#primerapellido').val().trim() === '')
		{
			alert('El campo primer apellido es requerido');
		} else
		{
			if(($('#primerapellido').val().trim()).length > 50)
			{
				alert('La longitud del campo primer nombre no puede ser mayor de 50 caracteres');
			}
		}
	});


	const Tabla = $("#DataTabla").DataTable({
				"info": false,
				"lengthChange": false,
				/*"dataTables_empty": "No existen registros",
				"odd": "nsañlsdf",*/
				"language":
				{
					"search": "Buscar:",
					"infoEmpty": "Mostrar 0 to 0 of 0 entries",
					"zeroRecords": "No se encontraron datos",
	    		"paginate":
					{
						"previous": "Atras",
	      		"next": "Siguiente",
	    		}
	  		}
		});

	/*const dataempresa = $("#tablaempresa").DataTable({
				"info": false,
				"lengthChange": false,
				"language":
				{
					"search": "Buscar:",
					"infoEmpty": "Mostrar 0 to 0 of 0 entries",
					"zeroRecords": "No se encontraron datos",
	    		"paginate":
					{
						"previous": "Atras",
	      		"next": "Siguiente",
	    		}
	  		}
		});

	const dataparte = $("#tablaparte").DataTable({
				"info": false,
				"lengthChange": false,
				"language":
				{
					"search": "Buscar:",
					"infoEmpty": "Mostrar 0 to 0 of 0 entries",
					"zeroRecords": "No se encontraron datos",
	    		"paginate":
					{
						"previous": "Atras",
	      		"next": "Siguiente",
	    		}
	  		}
		});

const dataplancuenta = $("#tablaplancuenta").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
				});

const dataproyecto = $("#tablaproyecto").DataTable({
							"info": false,
							"lengthChange": false,
							"language":
							{
								"search": "Buscar:",
								"infoEmpty": "Mostrar 0 to 0 of 0 entries",
								"zeroRecords": "No se encontraron datos",
				    		"paginate":
								{
									"previous": "Atras",
				      		"next": "Siguiente",
				    		}
				  		}
						});


const datarecurso = $("#tablarecurso").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

const dataunidadmedida = $("#tablaunidadmedida").DataTable({
			"info": false,
			"lengthChange": false,
			"language":
			{
				"search": "Buscar:",
				"infoEmpty": "Mostrar 0 to 0 of 0 entries",
				"zeroRecords": "No se encontraron datos",
    		"paginate":
				{
					"previous": "Atras",
      		"next": "Siguiente",
    		}
  		}
	});

const datatipovariable = $("#tablatipovariable").DataTable({
				"info": false,
				"lengthChange": false,
				"language":
				{
					"search": "Buscar:",
					"infoEmpty": "Mostrar 0 to 0 of 0 entries",
					"zeroRecords": "No se encontraron datos",
	    		"paginate":
					{
						"previous": "Atras",
	      		"next": "Siguiente",
	    		}
	  		}
		});

const dataveconomica = $("#tablaveconomica").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

const tablaaccionespecifica = $("#tablaaccionespecifica").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

const tablaunidadadministrativa = $("#tablaunidadadministrativa").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

const tablaactividad = $("#tablaactividad").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});

const tablafuente = $("#tablafuente").DataTable({
					"info": false,
					"lengthChange": false,
					"language":
					{
						"search": "Buscar:",
						"infoEmpty": "Mostrar 0 to 0 of 0 entries",
						"zeroRecords": "No se encontraron datos",
		    		"paginate":
						{
							"previous": "Atras",
		      		"next": "Siguiente",
		    		}
		  		}
			});*/

	$("#buscar-tabla").keyup(function() {
		Tabla.search($(this).val()).draw();
		/*dataempresa.search($(this).val()).draw();
		dataparte.search($(this).val()).draw();
		dataplancuenta.search($(this).val()).draw();
		dataproyecto.search($(this).val()).draw();
		datarecurso.search($(this).val()).draw();
    dataunidadmedida.search($(this).val()).draw();
		datatipovariable.search($(this).val()).draw();
		dataveconomica.search($(this).val()).draw();
		tablaaccionespecifica.search($(this).val()).draw();
		tablaunidadadministrativa.search($(this).val()).draw();
		tablaactividad.search($(this).val()).draw();
		tablafuente.search($(this).val()).draw();*/
  });

	/*$("#tablacentrocosto_filter").addClass("d-none");
	$("#tablaempresa_filter").addClass("d-none");
	$("#tablaparte_filter").addClass("d-none");
	$("#tablaplancuenta_filter").addClass("d-none");
	$("#tablaproyecto_filter").addClass("d-none");
	$("#tablarecurso_filter").addClass("d-none");
	$("#tablaunidadmedida_filter").addClass("d-none");
	$("#tablatipovariable_filter").addClass("d-none");
	$("#tablaveconomica_filter").addClass("d-none");*/


	/*<script type="text/javascript">
		$(document).ready(function(){
			$("#planCuenta").DataTable({
				"info": false
			});
		});
	</script>*/


	/*var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;

  if(regex.test($('#email').val().trim()))
	{
		regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
    } else
	{
        alert('La direccón de correo no es válida');
    }*/


		const tipoProyecto = $("#tipo-proyecto").val();
		const realType = $("#tipo option");

		$("#tipo option").each( function(index, element){
			if($(element).val() === tipoProyecto)
				$(element).prop("selected", "true");
		});

		/*const unidadMedida = $("#unidad-medida").val();
		const realType = $("#id_unimed option");

		$("#id_unimed option").each( function(index, element){
			if($(element).val() === unidadMedida)
				$(element).prop("selected", "true");
		});*/


});


//Rutina para agregar opciones a un <select> Año
function cargar_ano(domElement)
{
	var fecha = new Date();
	var ano = fecha.getFullYear();
	disable.text = 'Año';
	var select = document.getElementsByName(domElement)[0];
	for(var i=1900;i<=ano;i++)
	{
		var option = document.createElement("option");
		option.text = i;
		select.add(option);
	}
}

function cargar_dias()
{
	//var month = document.getElementById('mes').value;

	var month = $('#mes').val();

	switch(month)
	{
		case 'enero':
		case 'marzo':
		case 'mayor':
		case 'julio':
		case 'agosto':
		case 'octubre':
		case 'diciembre':
			var valormes = 31;
			break;
		case 'febrero':
			var valormes = 28;
			break;
		case 'abril':
		case 'junio':
		case 'septiembre':
		case 'noviembre':
			valormes = 30;
			break;
		default:
			alert('El mes no esta definido '+month);
	}

	var select = $('#diasmes');
	for(var i=1;i<=valormes;i++)
	{
		select.append('<option id="diasmes" value="'+i+'" >'+i+'</option>');
 	}
}


$(document).ready(function(){
		$("#preloaders").fadeOut(500);
	});
