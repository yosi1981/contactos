<?php

namespace App\Http\Controllers;

use App\Provincia;
use Auth;

class infocuentaController extends Controller
{
    //
    public function InfoReferidos()
    {
        $usuarioActual = Auth::user();
        \Session::put('seccion_actual', 'InfoCuenta');
        if ($usuarioActual->stringRol->nombre == 'admin') {
            $provincias = Provincia::all();
            return view($usuarioActual->stringRol->nombre . '.InfoCuenta.infocuenta', ["usuario" => $usuarioActual, "provincias" => $provincias]);
        } else {
            return view($usuarioActual->stringRol->nombre . '.InfoCuenta.infocuenta', ["usuario" => $usuarioActual]);
        }
    }
}
