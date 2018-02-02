<?php

namespace mod_inventario\Http\Middleware;

use Closure;
use Session;
class MDadministrador {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $usuario_actual = \Auth::user();
        if ($usuario_actual->id_tipoUsu != 1) {
            Session::flash('message-error','No tiene suficientes Privilegios para acceder');
            return redirect()->to('inventario/admin');
//            return view("inventario.mensajes.msj_rechazado")->with("msj", "No tiene suficientes Privilegios para acceder a esta seccion administrador");
        }

        return $next($request);
    }

}
