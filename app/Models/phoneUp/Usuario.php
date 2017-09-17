<?php namespace App\Models\phoneUp;

use App\Http\PeticionesAPI\Cliente;
use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\Authenticatable;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class Usuario implements Authenticatable
{
    use Implementacion_Authenticatable;

    public $data;

    /**
     *  Validacion de credenciales para acceso a API
     *
     * @param $user
     * @param $pw
     */
    public function validaCredenciales($user, $pw)
    {
        # Credenciales del cliente
        $idCliente = env('ID_CLIENT');
        $pwCliente = env('PW_CLIENT');

        #Validar identificador y clave de cliente
        if ($idCliente == null || $pwCliente == null)
            abort(500, 'Esta pagina no se encuentra vinculada con ' . config('app.name'));

        # Campos para validar credenciales
        $formulario = [
                'grant_type' => 'password',
                'client_id' => $idCliente,
                'client_secret' => $pwCliente,
                'username' => $user,
                'password' => $pw,
                'scope' => '*'
        ];

        $this->data =
            $this->clienteApi()->peticionPOST('/oauth/token', $formulario)->formatoRespuesta();

        # Almacenamiento de accesso para API en variables de sesion
        //$accesosAPI = json_decode(json_encode($this->data),true);
        //session(['API' => $accesosAPI]);

        return $this;
    }

    /**
     * @return Cliente
     */
    private function clienteApi()
    {
        return new Cliente();
    }

    /**
     * Valida si en la informacion que se obtiene de la consulta llega la propiedad error
     *
     * @return bool
     */
    public function autenticacionExitosa()
    {
        return isset($this->data->error) == false;
    }
}