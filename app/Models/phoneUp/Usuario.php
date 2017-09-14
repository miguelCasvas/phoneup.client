<?php namespace App\Models\phoneUp;

use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Authenticatable;

class Usuario implements Authenticatable
{

    private $urlApi;
    public $data;

    public function __construct()
    {
        $this->urlApi = env('API_URL');

        if ($this->urlApi == null)
            abort(500, 'url del api no esta definida');
    }

    public function validaCredenciales($user, $pw)
    {
        # Generar peticion de autorizacion al API
        $cliente = new Client();

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

            $this->data = json_decode( (string) $response->getBody() );


            return $this;

        }catch(\Exception $e){
            \Alert::error(trans('auth.failed'));
            return back();
        }

    }


    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
    }


    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        // TODO: Implement getAuthPassword() method.
    }


    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
    }


    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }


    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}