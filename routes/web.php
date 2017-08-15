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



Route::get('viewToken', function(){
    dd(request()->all());
});

# APLICACION INTERNA
Route::get('petitionapi', function(){


    $client = new GuzzleHttp\Client;

        $response = $client->post('http://phoneup.api.dev/oauth/token', [
            'form_params' => [
                'client_id' => 3,
                // The secret generated when you ran: php artisan passport:install
                'client_secret' => '0Uh2jbi5CWlAY68XcX9N40dWQPCN0caX4qWD8Fju',
                'grant_type' => 'password',
                'username' => 'miguel.castaneda@parservicios.com',
                'password' => '123456789',
                'scope' => '*',
            ]
        ]);


    $auth = json_decode( (string) $response->getBody() );
    dd($auth);

});

Route::get('petitionapi_2', function () {
    $query = http_build_query([
        'client_id' => 6,
        'redirect_uri' => 'http://phoneup.api.dev/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://phoneup.api.dev/oauth/authorize?'.$query);
});

Route::get('/callback', function(){

    $code = urldecode(request()->code);
    //dump(request()->all());
    $http = new GuzzleHttp\Client;
    $response = $http->post('http://phoneup.api.dev/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => 6,
            'client_secret' => 'xdwyycNlgAok7FDtN0ix3AxaAKPlCEJX5AjG88a6',
            'redirect_uri' => 'http://phoneup.client.dev/callback',
            'code' => $code,
        ],
    ]);

    dd(json_decode((string) $response->getBody(), true));

    //
    dd('hola');
    //
    //return json_decode((string) $response->getBody(), true);
});

Route::get('callback_1',function(){
   dd('hola que hace');
});