<?php

namespace App\Http\Controllers;

use App\Http\PeticionesAPI\Cliente;
use App\Http\PeticionesAPI\PeticionesSeguras;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $clienteApi;

    public function __construct()
    {

    }

    protected function setClienteApi()
    {
        $this->clienteApi = new Cliente();
    }

    protected function setClienteApiSegura()
    {
        $this->clienteApi = new PeticionesSeguras();
    }

}
