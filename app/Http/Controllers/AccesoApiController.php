<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccesoApiController extends Controller
{
    private $urlApi;

    public function __construct()
    {
        $this->urlApi = env('API_URL');

        if ($this->urlApi == null)
            abort(500, 'url del api no esta definida');
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
                    'client_secret' => 'Pqf1eUXFdKn675YjmVsURSNc4qzaiRDHGaNkH1G1',
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

        $COOKIE =
            \Request::cookie('Sesion', Session::getId());


        return redirect('inicio')
            ->withCookie(cookie('fuente', $COOKIE, 60 * 24 * 365));;
    }
}
