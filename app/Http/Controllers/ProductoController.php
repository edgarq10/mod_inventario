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
            $productos = DB::table('productos')->where('nombre_pro', 'LIKE', '%' . $query . '%')
                    ->orderBy('id_pro', 'desc')
                    ->paginate(3);
            return view('inventario.producto.index', ["productos" => $productos,
                "searchText" => $query]);
//            
        }
    }

    public function create() {
        return view("inventario.producto.create");
    }

    public function store(ProductoFormRequest $request) {
        $producto = new Producto;
        $producto->codigo_pro = $request->get('codigo_pro');
        $producto->nombre_pro = $request->get('nombre_pro');
        $producto->descripcion_pro = $request->get('descripcion_pro');
        $producto->iva_pro = $request->get('iva_pro');
        $producto->costo_pro = $request->get('costo_pro');
        $producto->pvp_pro = $request->get('pvp_pro');
        $producto->estado_pro = $request->get('estado_pro');

        $producto->save();

        return Redirect::to("inventario/producto");
    }

    public function show() {
        
    }

    public function edit($id) {
        return view("inventario.producto.edit", ["producto" => Producto::findOrFail($id)]);
    }

    public function update(ProductoFormRequest $request, $id) {
        $producto = Producto::findOrFail($id);

        $producto->codigo_pro = $request->get('codigo_pro');
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
