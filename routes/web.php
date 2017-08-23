<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'HomeController@index');

########################## TOKEN DE ACCESO PARA APLICACION INTERNA  ################################################3
Route::get('petitionapi', function(){

});

########################################### PAGINA DE INICIO  #########################################################
Route::get('inicio', 'InicioController@vistaInicio');


############ FORMULARIO LOGUEO #############################
Route::get('iniciosesion', 'AccesoApiController@formularioLogin');
########### POST LOGIN #####################################
Route::post('accesoSeguro', 'AccesoApiController@accesoSeguro');