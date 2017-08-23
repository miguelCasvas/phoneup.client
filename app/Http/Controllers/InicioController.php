<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PeticionesAPI\MiUsuarioController;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function vistaInicio()
    {
        $infoUsuario = (new MiUsuarioController())->obtenerInfoUsuario();

        return view('home');
    }

}
