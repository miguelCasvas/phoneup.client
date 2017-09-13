<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PeticionesAPI\MiUsuarioController;
use Illuminate\Http\Request;

class InicioController extends Controller
{

    public function vistaInicio()
    {
        $infoMiUsuario = (new MiUsuarioController())->obtenerInfoUsuario()->data;
        $data = compact('infoMiUsuario');

        return view('home', $data);
    }

}
