<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
  return 'hola';
});

Route::get('/siforpre', 'SiforpreController@indice');

//--------------------------- PROYECTOS -------------------------------
Route::get('/sfp-proyectos', 'Sfp_proyectosController@index');
Route::get('/sfp-proyectos/crear', 'Sfp_proyectosController@create');
Route::post('/sfp-proyectos/crear', 'Sfp_proyectosController@store');
Route::get('/sfp-proyectos/{id_registro?}/editar', 'Sfp_proyectosController@edit');
Route::post('/sfp-proyectos/{id_registro?}/editar', 'Sfp_proyectosController@update');
Route::get('/sfp-proyectos/{id_registro?}/mostrar', 'Sfp_proyectosController@show');
Route::post('/sfp-proyectos/{id_registro?}/eliminar', 'Sfp_proyectosController@destroy');

//--------------------------- UNIDAD ADMINISTRATIVA -------------------------------
Route::get('/sfp-unidadadministrativas', 'Sfp_unidadadministrativasController@index');
Route::get('/sfp-unidadadministrativas/crear', 'Sfp_unidadadministrativasController@create');
Route::post('/sfp-unidadadministrativas/crear', 'Sfp_unidadadministrativasController@store');
Route::get('/sfp-unidadadministrativas/{id_registro?}/editar', 'Sfp_unidadadministrativasController@edit');
Route::post('/sfp-unidadadministrativas/{id_registro?}/editar', 'Sfp_unidadadministrativasController@update');
Route::get('/sfp-unidadadministrativas/{id_registro?}/mostrar', 'Sfp_unidadadministrativasController@show');
Route::post('/sfp-unidadadministrativas/{id_registro?}/eliminar', 'Sfp_unidadadministrativasController@destroy');

//--------------------------- ACCION ESPECIFICA -------------------------------
Route::get('/sfp-accionespecificas', 'Sfp_acciones_especificasController@index');
Route::get('/sfp-accionespecificas/crear', 'Sfp_acciones_especificasController@create');
Route::post('/sfp-accionespecificas/crear', 'Sfp_acciones_especificasController@store');
Route::get('/sfp-accionespecificas/{id_registro?}/editar', 'Sfp_acciones_especificasController@edit');
Route::post('/sfp-accionespecificas/{id_registro?}/editar', 'Sfp_acciones_especificasController@update');
Route::get('/sfp-accionespecificas/{id_registro?}/mostrar', 'Sfp_acciones_especificasController@show');
Route::post('/sfp-accionespecificas/{id_registro?}/eliminar', 'Sfp_acciones_especificasController@destroy');

//--------------------------- FUENTE FINANCIAMIENTO -------------------------------
Route::get('/sfp-fuentefinanciamientos', 'Sfp_fuentes_financiamientosController@index');
Route::get('/sfp-fuentefinanciamientos/crear', 'Sfp_fuentes_financiamientosController@create');
Route::post('/sfp-fuentefinanciamientos/crear', 'Sfp_fuentes_financiamientosController@store');
Route::get('/sfp-fuentefinanciamientos/{id_registro?}/editar', 'Sfp_fuentes_financiamientosController@edit');
Route::post('/sfp-fuentefinanciamientos/{id_registro?}/editar', 'Sfp_fuentes_financiamientosController@update');
Route::get('/sfp-fuentefinanciamientos/{id_registro?}/mostrar', 'Sfp_fuentes_financiamientosController@show');
Route::post('/sfp-fuentefinanciamientos/{id_registro?}/eliminar', 'Sfp_fuentes_financiamientosController@destroy');

//--------------------------- ACTIVIDAD -------------------------------
Route::get('/sfp-actividades', 'Sfp_actividadesController@index');
Route::get('/sfp-actividades/crear', 'Sfp_actividadesController@create');
Route::post('/sfp-actividades/crear', 'Sfp_actividadesController@store');
Route::get('/sfp-actividades/{id_registro?}/editar', 'Sfp_actividadesController@edit');
Route::post('/sfp-actividades/{id_registro?}/editar', 'Sfp_actividadesController@update');
Route::get('/sfp-actividades/{id_registro?}/mostrar', 'Sfp_actividadesController@show');
Route::post('/sfp-actividades/{id_registro?}/eliminar', 'Sfp_actividadesController@destroy');

//--------------------------- ASIGNACION DE RECURSOS -------------------------------
Route::get('/sfp-asignacionrecursos', 'Sfp_asignaciones_recursosController@index');
Route::get('/sfp-asignacionrecursos/crear', 'Sfp_asignaciones_recursosController@create');
Route::post('/sfp-asignacionrecursos/crear', 'Sfp_asignaciones_recursosController@store');
Route::get('/sfp-asignacionrecursos/{id_registro?}/editar', 'Sfp_asignaciones_recursosController@edit');
Route::post('/sfp-asignacionrecursos/{id_registro?}/editar', 'Sfp_asignaciones_recursosController@update');
Route::get('/sfp-asignacionrecursos/{id_registro?}/mostrar', 'Sfp_asignaciones_recursosController@show');
Route::post('/sfp-asignacionrecursos/{id_registro?}/eliminar', 'Sfp_asignaciones_recursosController@destroy');


//--------------------------- EMPRESAS -------------------------------
Route::get('/sfp-empresas', 'Sfp_empresasController@index');
Route::get('/sfp-empresas/crear', 'Sfp_empresasController@create');
Route::post('/sfp-empresas/crear', 'Sfp_empresasController@store');
Route::get('/sfp-empresas/{id_registro?}/editar', 'Sfp_empresasController@edit');
Route::post('/sfp-empresas/{id_registro?}/editar', 'Sfp_empresasController@update');
Route::get('/sfp-empresas/{id_registro?}/mostrar', 'Sfp_empresasController@show');
Route::post('/sfp-empresas/{id_registro?}/eliminar', 'Sfp_empresasController@destroy');

//--------------------------- PLAN DE CUENTAS -------------------------------
Route::get('/sfp-plancuentas', 'Sfp_plancuentasController@index');
Route::get('/sfp-plancuentas/crear', 'Sfp_plancuentasController@create');
Route::post('/sfp-plancuentas/crear', 'Sfp_plancuentasController@store');
Route::get('/sfp-plancuentas/{id_registro?}/editar', 'Sfp_plancuentasController@edit');
Route::post('/sfp-plancuentas/{id_registro?}/editar', 'Sfp_plancuentasController@update');
Route::get('/sfp-plancuentas/{id_registro?}/mostrar', 'Sfp_plancuentasController@show');
Route::post('/sfp-plancuentas/{id_registro?}/eliminar', 'Sfp_plancuentasController@destroy');

//--------------------------- CENTRO DE COSTOS -------------------------------
Route::get('/sfp-centrocostos', 'Sfp_centrocostosController@index');
Route::get('/sfp-centrocostos/crear', 'Sfp_centrocostosController@create');
Route::post('/sfp-centrocostos/crear', 'Sfp_centrocostosController@store');
Route::get('/sfp-centrocostos/{id_registro?}/editar', 'Sfp_centrocostosController@edit');
Route::post('/sfp-centrocostos/{id_registro?}/editar', 'Sfp_centrocostosController@update');
Route::get('/sfp-centrocostos/{id_registro?}/mostrar', 'Sfp_centrocostosController@show');
Route::post('/sfp-centrocostos/{id_registro?}/eliminar', 'Sfp_centrocostosController@destroy');

//--------------------------- RECURSOS -------------------------------
Route::get('/sfp-recursos', 'Sfp_recursosController@index');
Route::get('/sfp-recursos/crear', 'Sfp_recursosController@create');
Route::post('/sfp-recursos/crear', 'Sfp_recursosController@store');
Route::get('/sfp-recursos/{id_registro?}/editar', 'Sfp_recursosController@edit');
Route::post('/sfp-recursos/{id_registro?}/editar', 'Sfp_recursosController@update');
Route::get('/sfp-recursos/{id_registro?}/mostrar', 'Sfp_recursosController@show');
Route::post('/sfp-recursos/{id_registro?}/eliminar', 'Sfp_recursosController@destroy');

//--------------------------- PARTES -------------------------------
Route::get('/sfp-partes', 'Sfp_partesController@index');
Route::get('/sfp-partes/crear', 'Sfp_partesController@create');
Route::post('/sfp-partes/crear', 'Sfp_partesController@store');
Route::get('/sfp-partes/{id_registro?}/editar', 'Sfp_partesController@edit');
Route::post('/sfp-partes/{id_registro?}/editar', 'Sfp_partesController@update');
Route::get('/sfp-partes/{id_registro?}/mostrar', 'Sfp_partesController@show');
Route::post('/sfp-partes/{id_registro?}/eliminar', 'Sfp_partesController@destroy');

//--------------------------- UNIDAD DE MEDIDA -------------------------------
Route::get('/sfp-unidadmedidas', 'Sfp_unidadmedidasController@index');
Route::get('/sfp-unidadmedidas/crear', 'Sfp_unidadmedidasController@create');
Route::post('/sfp-unidadmedidas/crear', 'Sfp_unidadmedidasController@store');
Route::get('/sfp-unidadmedidas/{id_registro?}/editar', 'Sfp_unidadmedidasController@edit');
Route::post('/sfp-unidadmedidas/{id_registro?}/editar', 'Sfp_unidadmedidasController@update');
Route::get('/sfp-unidadmedidas/{id_registro?}/mostrar', 'Sfp_unidadmedidasController@show');
Route::post('/sfp-unidadmedidas/{id_registro?}/eliminar', 'Sfp_unidadmedidasController@destroy');

//--------------------------- TIPOS DE VARIABLES -------------------------------
Route::get('/sfp-tipovariables', 'Sfp_tipovariablesController@index');
Route::get('/sfp-tipovariables/crear', 'Sfp_tipovariablesController@create');
Route::post('/sfp-tipovariables/crear', 'Sfp_tipovariablesController@store');
Route::get('/sfp-tipovariables/{id_registro?}/editar', 'Sfp_tipovariablesController@edit');
Route::post('/sfp-tipovariables/{id_registro?}/editar', 'Sfp_tipovariablesController@update');
Route::get('/sfp-tipovariables/{id_registro?}/mostrar', 'Sfp_tipovariablesController@show');
Route::post('/sfp-tipovariables/{id_registro?}/eliminar', 'Sfp_tipovariablesController@destroy');

//--------------------------- VARIABLES ECONOMICAS -------------------------------
Route::get('/sfp-variableeconomicas', 'Sfp_variableeconomicasController@index');
Route::get('/sfp-variableeconomicas/crear', 'Sfp_variableeconomicasController@create');
Route::post('/sfp-variableeconomicas/crear', 'Sfp_variableeconomicasController@store');
Route::get('/sfp-variableeconomicas/{id_registro?}/editar', 'Sfp_variableeconomicasController@edit');
Route::post('/sfp-variableeconomicas/{id_registro?}/editar', 'Sfp_variableeconomicasController@update');
Route::get('/sfp-variableeconomicas/{id_registro?}/mostrar', 'Sfp_variableeconomicasController@show');
Route::post('/sfp-variableeconomicas/{id_registro?}/eliminar', 'Sfp_variableeconomicasController@destroy');

Route::get('/sfp-acciones-especificas/buscar', 'Sfp_acciones_especificasController@search');
