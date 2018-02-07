<?php

namespace mod_inventario\Http\Controllers;
use Illuminate\Http\Request;
use mod_inventario\Http\Requests;
use mod_inventario\Producto;
use Illuminate\Support\Facades\Redirect;
use mod_inventario\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index(Request $request) {
        if ($request) {
            $query = trim($request->get('searchText'));
            $productos = DB::table('productos as p')
                    ->join('unidad_medida as u', 'u.id_unidMedida', '=', 'p.id_unidMedida')
                    ->select('p.*', 'u.nombre_unidMedida')
                    ->where('p.nombre_pro', 'LIKE', '%' . $query . '%', 'or', 'p.codigo_pro', 'LIKE', '%' . $query . '%')
                    ->orderBy('p.id_pro', 'desc')
                    ->paginate(7);
            return view('inventario.producto.index', ["productos" => $productos,
                "searchText" => $query]);
//            
        }
    }

    public function create() {
        $unidad_medida = DB::table('unidad_medida')->get();
        $newcod = "";
        $codigo_pro = DB::table('productos')->max('codigo_pro');
        if ($codigo_pro == null) {
            $newcod = "PRO-0001";
        } else {
            $rest = ((substr($codigo_pro, -4)) + 1) . '';
            if ($rest > 1 && $rest <= 9) {
                $newcod = 'PRO-000' . $rest;
            } else {
                if ($rest >= 10 && $rest <= 99) {
                    $newcod = 'PRO-00' . $rest;
                } else {
                    if ($rest >= 100 && $rest <= 999) {
                        $newcod = 'PRO-0' . $rest;
                    } else {
                        $newcod = 'PRO-' . $rest;
                    }
                }
            }
        }
        return view("inventario.producto.create", ["unidad_medida" => $unidad_medida],["cod_pro" => $newcod]);
    }

    public function store(ProductoFormRequest $request) {
        $producto = new Producto;
        $newcod = "";
        $codigo_pro = DB::table('productos')->max('codigo_pro');
        if ($codigo_pro == null) {
            $newcod = "PRO-0001";
        } else {
            $rest = ((substr($codigo_pro, -4)) + 1) . '';
            if ($rest > 1 && $rest <= 9) {
                $newcod = 'PRO-000' . $rest;
            } else {
                if ($rest >= 10 && $rest <= 99) {
                    $newcod = 'PRO-00' . $rest;
                } else {
                    if ($rest >= 100 && $rest <= 999) {
                        $newcod = 'PRO-0' . $rest;
                    } else {
                        $newcod = 'PRO-' . $rest;
                    }
                }
            }
        }
        $producto->codigo_pro = $newcod;
        $producto->nombre_pro = $request->get('nombre_pro');
      
        $producto->costo_pro = $request->get('costo_pro');
        $producto->pvp_pro = $request->get('pvp_pro');
          $producto->id_unidMedida = $request->get('u_medida');
          $producto->iva_pro = $request->get('iva_pro');
        $producto->estado_pro = $request->get('estado_pro');
        $producto->descripcion_pro = $request->get('descripcion_pro');
        $producto->save();
        return Redirect::to("inventario/producto");
    }

    public function show() {
        
    }

    public function edit($id) {
        $unidad_medida = DB::table('unidad_medida')->get();
        
        return view("inventario.producto.edit", ["producto" => Producto::findOrFail($id)],["unidad_medida" => $unidad_medida]);
    }

    public function update(ProductoFormRequest $request, $id) {
        $producto = Producto::findOrFail($id);

//        $producto->codigo_pro = $request->get('codigo_pro');
        $producto->nombre_pro = $request->get('nombre_pro');
        $producto->descripcion_pro = $request->get('descripcion_pro');
        $producto->iva_pro = $request->get('iva_pro');
        $producto->costo_pro = $request->get('costo_pro');
        $producto->pvp_pro = $request->get('pvp_pro');
        $producto->estado_pro = $request->get('estado_pro');
        $producto->update();
        return Redirect::to('inventario/producto');
    }

    public function destroy($id) {
        $producto = Producto::findOrFile($id);
        $producto->estado = 0;
        $producto->update();
        return Redirect::to('inventario/producto');
    }

}
