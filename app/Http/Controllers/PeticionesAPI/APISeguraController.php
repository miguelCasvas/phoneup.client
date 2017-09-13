<?php

namespace App\Http\Controllers\PeticionesAPI;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class APISeguraController extends Controller
{
    protected $token;
    protected $token_refresh;
    private $urlApi;

    public function __construct()
    {

        $this->urlApi = env('API_URL');
        $this->token = session('access_token');
        $this->token_refresh = session('refresh_token');

    }

    private function clienteConexion()
    {
        return

            new Client([
                'base_uri' => $this->urlApi
            ]);
    }

    /**
     * Estructura basica para generar peticiones GET
     *
     * @param       $url
     * @param array $params
     * @param null  $cabecera
     *
     * @return JSON
     */
    protected function peticionGet($url, $params = [], $cabecera = null)
    {
        $response =
            $this->clienteConexion()
                ->request('GET', $url, [
                    'headers'   => $cabecera ?: $this->cabecerasPeticion(),
                    'query'     => $params
                ]);

        return
            json_decode( (string) $response->getBody() );
    }

    /**
     * Retorno de cabeceras necesarias para generar peticiones al api
     *
     * @return array
     */
    protected function cabecerasPeticion($cabecera = null)
    {

        $header = [];

        switch ($cabecera){

            case '...':
                break;


            default:

                # Cabecera default para generar peticiones a rutas protegidas
                $header =
                    [
                        'Accept' => 'application/json',
                        'Authorization' => 'Bearer ' . $this->token
                    ];

                break;
        }


        return $header;
    }
}
