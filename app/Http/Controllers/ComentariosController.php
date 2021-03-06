<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ComentariosController extends Controller
{
    public function guardarComentario(request $request){
        $validate = $this->validate($request, [
            'nombre' => 'required',
            'correo' => 'required',
            'comentario' => 'required'           
        ]);

        $contacto = new Contacto();
        $usuario = \Auth::user();
        error_log($usuario);
        
        $contacto->producto_id = $request->input('product_id'); 
        $contacto->comment = $request->input('comentario');
        $contacto->name = ($request->input('nombre')==null)?$usuario->name:$request->input('nombre');
        $contacto->email = ($request->input('correo')==null)?$usuario->email:$request->input('correo');

        $contacto->save();

        if($request->input('refresh')=='2'){
            return redirect()->route('welcome')->with(array(
                'message' => '┬íComentario agregado exactamente!'
            ));
        }else{
            return redirect()->route('producto', ['id' =>$request->input('product_id')])->with(array(
                'message' => '┬íComentario agregado exactamente!'
            ));
        }
    }
}
