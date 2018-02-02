<?php

namespace mod_inventario\Http\Controllers;


use Illuminate\Http\Request;
use mod_inventario\Http\Requests;
use mod_inventario\Http\Controllers\Controller;

class FrontController extends Controller {
    
     public function __construct(){
    $this->middleware('auth',['only' => 'admin']);
  }



   public function admin(){
        return view('inventario.admin.index');
   }
}
