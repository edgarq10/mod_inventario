<?php

namespace mod_inventario\Http\Middleware;

use Closure;

class MDadministrador
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
        if($usuario_actual->id_tipoUsu!=1){
//            return view("inventario.producto.msj_rechazado","hola");
        }
           
        return $next($request);
    }
}
