<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paquete;

class PaqueteController extends Controller
{
    public function getPaquetes()
    {
    	$paquetes=Paquete::all();
    	return view('admin.Paquete.index',compact('paquetes'))->render();
    }
}
