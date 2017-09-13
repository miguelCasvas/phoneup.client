<?php

namespace App\Http\Controllers\PeticionesAPI;

use Illuminate\Http\Request;

class MiUsuarioController extends APISeguraController
{

    public function __construct()
    {
        parent::__construct();

    }

    public function obtenerInfoUsuario()
    {
        dd($this->peticionGet('miusuario'));
    }
}
