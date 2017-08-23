<?php

namespace App\Http\Controllers\PeticionesAPI;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    /**
     * @param $url
     * @param array|null $params
     * @return mixed
     */
    protected function generarPeticion($url, array $params = null)
    {

        $cliente = new Client();

        $response = $cliente->post($this->urlApi.$url, [
            'form_params' => [
                $params
            ]
        ]);

        return
            json_decode( (string) $response->getBody() );

    }
}
