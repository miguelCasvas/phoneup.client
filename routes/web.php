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

Route::get('/', 'HomeController@index');

############################# TOKEN DE ACCESO PARA APLICACION INTERNA  #################################################
Route::get('petitionapi', 'PeticionesAPI\MiUsuarioController@obtenerInfoUsuario');

############################################ PAGINA DE INICIO  #########################################################
Route::get('inicio', 'InicioController@vistaInicio');

############################################# RUTAS DE SESION ##########################################################
//Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('login', 'Auth\LoginController@login');


