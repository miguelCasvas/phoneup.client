<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $correo = $request->get('correo');
        $pw = $request->get('contrasenia');

        if (Auth::attempt(['usuario' => $correo, 'password' => $pw]) == false){
            \Alert::error(trans('auth.failed'));
            return redirect()->back()->withInput( $request->except('contrasenia'));
        }

        return redirect('inicio');
    }

}
