<?php

namespace mod_inventario\Http\Controllers;

use Illuminate\Http\Request;

class AjusteController extends Controller
{
     public function index(Request $request) {
        
            return view('inventario.ajuste.index');
//            
        
    }
}
