<?php

namespace mod_inventario\Http\Middleware;

use Closure;
use Session;

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
            Session::flash('message-error','No tiene suficientes Privilegios para acceder');
            return redirect()->to('inventario/admin');

        }
        return $next($request);
    }
}
