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


############ FORMULARIO LOGUEO #############################
Route::get('iniciosesion', function(){
    return view('auth.login');
});

########### POST LOGIN #####################################
Route::post('accesoSeguro', function(){

    $client = new GuzzleHttp\Client;
    $user = request()->get('email');
    $pw = request()->get('password');

    $response = $client->post('http://phoneup.api.com:8080/oauth/token', [
        'form_params' => [
            'client_id' => 2,
            'client_secret' => '9aYBryoWHZ19OFLHsqHNmwIeHnTitNUrTUr9wLDO',
            'grant_type' => 'password',
            'username' => $user,
            'password' => $pw,
            'scope' => '*',
        ]
    ]);


    $auth = json_decode( (string) $response->getBody() );


    session('access_token', $auth->access_token);
    session('refresh_token', $auth->refresh_token);
    dd(session(), $auth->access_token);

});