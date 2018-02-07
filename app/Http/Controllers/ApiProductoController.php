<?php

namespace mod_inventario\Http\Controllers;
use mod_inventario\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DB;
class ApiProductoController extends Controller {
    public function index(){
        
       
        
     $productos = Producto::all() ->toArray();
    	return response() ->json($productos);
    }
}
