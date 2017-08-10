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

Route::get('/callback', function(){

    if (! empty(request()->code)){
        $code = urldecode(request()->code);

        $http = new GuzzleHttp\Client;
        $response = $http->post('http://phoneup.api.dev/oauth/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => '3',
                'client_secret' => '0Uh2jbi5CWlAY68XcX9N40dWQPCN0caX4qWD8Fju',
                'redirect_uri' => 'http://phoneup.client.dev/callback',
                'code' => $code,
            ],
        ]);

        dd(json_decode((string) $response->getBody(), true));
    }

    //
    dd('hola');
    //
    //return json_decode((string) $response->getBody(), true);
});

Route::get('viewToken', function(){
    dd(request()->all());
});