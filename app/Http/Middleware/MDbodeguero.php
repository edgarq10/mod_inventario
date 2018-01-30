<?php

namespace mod_inventario\Http\Middleware;

use Closure;

class MDbodeguero
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
        $usuario_actual= \Auth::user();
        if($usuario_actual->id_tipoUsu!=2){
            
        }
        return $next($request);
    }
}
