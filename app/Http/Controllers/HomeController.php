<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\producto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = producto::orderBy('id','desc')->paginate(6);

        return view('home',array(
            'productos' => $productos
        ));   
    }


    public function welcome()
    {
        $productos = producto::orderBy('id','desc')->paginate(6);

        return view('welcome',array(
            'productos' => $productos
        ));   
    }

    public function getProducto($id){
        $producto = producto::find($id);
    
        // print($producto);
        return view('productos.detalleProducto', array(
            'producto' => $producto,
        ));
    }

    
}
