<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class MDuserAdminProvincia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       $usuarioActual=\Auth::user();
        if($usuarioActual->tipo_usuario!=2)
        {
            return Redirect::to('home');
        }
        return $next($request);
    }
}
