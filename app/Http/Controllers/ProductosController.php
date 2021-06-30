<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Filesystem\Filesystem;

use App\producto;


class ProductosController extends Controller
{
    
    public function crearProducto(){
        return view('productos.crearProducto');
    }

    public function guardarProducto(Request $request){
        //validar formulario
        $validarData = $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'imagen' => 'required',
        ]);

        $producto = new producto();
        $user = \Auth::user();
        $producto->user_id = $user->id;
        $producto->name = $request->input('nombre');
        $producto->description = $request->input('descripcion');
        $producto->quantity = $request->input('cantidad');
        $producto->price = $request->input('precio');

        $image = $request->file('imagen');
        if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $producto->image = $image_path;
        }

        $producto->save();

        return redirect()->route('home')->with(array(
            'message' => 'El articulo se ha guardado correctamente!!'
        ));
    }

    public function getImagenes($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function borrar($id){
        $user = \Auth::user();
        $producto = producto::find($id);
        if($user){
            Storage::disk('images')->delete($producto->image);
            $producto->delete();
            $message = array('message' => '�Producto eliminado correctamente!');
        }else{
        $message = array('message' => '�El producto no se ha podido eliminar!');
        }
        return redirect()->route('home')->with($message);
    }
   
    public function editar($id){
        $user = \Auth::user();
        $producto = producto::findOrFail($id);
       // print($producto);
        if($user){
            return view('productos.editarProducto', array(
                'producto' => $producto
            ));
        }else{
            return redirect()->route('home')->with($message);
        }
    }

    public function modificarProducto($id , Request $request){
        $validarData = $this->validate($request,[
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'cantidad' => 'required',
            'imagen' => '',
        ]);

        $producto = producto::findOrFail($id);
        $user = \Auth::user();
        $producto->user_id = $user->id;
        $producto->name = $request->input('nombre');
        $producto->description = $request->input('descripcion');
        $producto->quantity = $request->input('cantidad');
        $producto->price = $request->input('precio');

        $image = $request->file('imagen');
        if($image){
            $image_path = time().$image->getClientOriginalName();
            \Storage::disk('images')->put($image_path, \File::get($image));
            $producto->image = $image_path;
        }

        $producto->update();

        return redirect()->route('home')->with(array(
            'message' => '¡El articulo se ha editado correctamente!'
        ));
    }
    
    public function busqueda($busqueda = null){
        if(is_null($busqueda)){
          $busqueda = \Request::get('search');
          
        //   return redirect()->route('busquedaProducto', array('search'=> $busqueda));
        }
        $productos = producto::where('name', 'LIKE', '%'.$busqueda.'%')->paginate(6);

        return view('productos.busqueda', array(
            'productos' => $productos,
            'search' => $busqueda
        ));
    }
    
     public function agregarAcarrito(){
        return redirect()->route('welcome')->with(array(
            'carrito' => '¡El articulo se ha agregado al carrito!'
        ));
    }
}
