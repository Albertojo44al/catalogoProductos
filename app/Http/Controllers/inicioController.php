<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function inicio(){
        return view('usuarios.login');
    }

    public function registro(){
        return view('usuarios.registro');
    }
}
