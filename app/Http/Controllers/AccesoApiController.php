<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AccesoApiController extends Controller
{
    private $urlApi;

    public function __construct()
    {
        $this->urlApi = env('API_URL');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *  Visualizacion de formulario para inicisio de sesion
     */
    public function formularioLogin()
    {
        return view('auth.login');
    }

    /**
     * Validar formatos y requisitos de cada campo
     * si no cumple condiciones redirecionara al formulario de sesion
     *
     * @param Request $request
     */
    private function validaCampos(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required|email',
            'contrasenia' => 'required'
        ]);
    }

    /**
     * @param Request $request
     */
    public function accesoSeguro(Request $request)
    {
        $this->validaCampos($request);

        # Generar peticion de autorizacion al API
        $cliente = new Client();
        $user = $request->get('correo');
        $pw = $request->get('contrasenia');

        try{

            $response = $cliente->post($this->urlApi.'/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 2,
                    'client_secret' => '9aYBryoWHZ19OFLHsqHNmwIeHnTitNUrTUr9wLDO',
                    'username' => $user,
                    'password' => $pw,
                    'scope' => '*'
                ]
            ]);

            $auth = json_decode( (string) $response->getBody() );

        }catch(\Exception $e){
            \Alert::error(trans('auth.failed'));
            return back();
        }

        # Almacenamiento de token de acceso en varibles de sesion
        session(
            [
                'access_token' => $auth->access_token,
                'refresh_token' => $auth->refresh_token
            ]);

        return redirect('inicio');
    }
}
