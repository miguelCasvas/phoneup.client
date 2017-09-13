<?php

namespace App\Http\Controllers\PeticionesAPI;

use Illuminate\Http\Request;

class MiUsuarioController extends APISeguraController
{

    public function __construct()
    {
        parent::__construct();

    }


    /**
     * Retorna una estructura JSON con la información gral.
     * del usuario que inicia sesion
     *
     * @return JSON
     */
    public function obtenerInfoUsuario()
    {
        return
            $this->peticionGet('miusuario');
    }
}
