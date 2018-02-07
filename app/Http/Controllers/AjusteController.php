<?php

namespace mod_inventario\Http\Controllers;

use Illuminate\Http\Request;
use mod_inventario\Http\Requests;
use mod_inventario\AjusteProducto;
use mod_inventario\DetalleAjuste;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use mod_inventario\Http\Requests\AjusteFormRequest;
use DB;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class AjusteController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('searchText'));
            $ajustes = DB::table('ajustes as a')
                    ->join('users as u', 'u.id', '=', 'a.id')
                    ->select('a.*', 'u.id', 'u.cedula', 'u.name', 'u.email')
                    ->where('a.motivo_ajuste', 'LIKE', '%' . $query . '%', 'or', 'u.cedula', 'LIKE', '%' . $query . '%', 'or', 'u.name', 'LIKE', '%' . $query . '%')
                    ->orderBy('a.id_ajuste', 'desc')
                    ->paginate(7);
            return view('inventario.ajuste.index', ["ajustes" => $ajustes,
                "searchText" => $query]);
        }
        return view('inventario.ajuste.create');
    }

    public function create() {

        $productos = DB::table('productos as p')
                ->select(DB::raw('CONCAT(p.codigo_pro," ",p.nombre_pro) AS nombre_prod'), 'p.id_pro','p.*')
                ->where('p.estado_pro', '=', 'A')
                ->get();
        $newcod = "";
        $num_ajuste = DB::table('ajustes')->max('numero_ajuste');
        if ($num_ajuste == null) {
            $newcod = "AJU-0001";
        } else {
            $rest = ((substr($num_ajuste, -4)) + 1) . '';
            if ($rest > 1 && $rest <= 9) {
                $newcod = 'AJU-000' . $rest;
            } else {
                if ($rest >= 10 && $rest <= 99) {
                    $newcod = 'AJU-00' . $rest;
                } else {
                    if ($rest >= 100 && $rest <= 999) {
                        $newcod = 'AJU-0' . $rest;
                    } else {
                        $newcod = 'AJU-' . $rest;
                    }
                }
            }
        }
//        return view("inventario.ajuste.create", ["productos" => $productos],["num_juste" => $newcod]);
        return view("inventario.ajuste.create", ["productos" => $productos], ["num_ajuste" => $newcod]);
    }

    public function store(AjusteFormRequest $request) {
        try {
            DB::beginTransaction();
            $ajuste = new AjusteProducto;
            $ajuste->numero_ajuste=$request->get('numero_ajuste');
            $ajuste->id = $request->get('id_usuario');
            $ajuste->motivo_ajuste = $request->get('motivo_ajus');
            $ajuste->fecha_ajuste = $request->get('fecha_ajus');
//            $mytime = Carbon::now('America/Guayaquil');
//            $ajuste->fecha_ajuste = $mytime->toDateTimeString();
            $ajuste->save();
            
            $id_pro = $request->get('id_pro');
            $cantidad = $request->get('cantidad');
            
            
            $cont = 0;
            while ($cont < count($id_pro)){
                $detalle =new DetalleAjuste();
                $detalle->id_ajuste=$ajuste->id_ajuste;
                $detalle->id_pro=$id_pro[$cont];
                $detalle->cambioStock=$cantidad[$cont];
//                $detalle->tipoMoviemiento=$id_pro[$cont];
                $detalle->save();
                $cont = $cont + 1;
            }
                DB::comit();
        } catch (\Exception $e) {
            DB::rollback();
        }
    }

}
