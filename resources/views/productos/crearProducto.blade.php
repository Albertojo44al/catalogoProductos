@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md">
      
        <div class="card">
            <div class="card-header">
                <h2>agregar un nuevo producto</h2>
                <hr>
            </div>
            <div class="card-body text-center">
                <form action="{{ route('guardarProducto')}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
                {!! csrf_field() !!}
                @if($errors->any())
                    <div class="aler alert-danger">
                        <ul>
                             @foreach ($errors->all() as $error)
                                 <li>{{$error}}</li>
                             @endforeach   
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                    <label for="nombre"> Nombre </label>
                    <input type="text" class="form-control" id="nombre" name="nombre"  value="{{old('nombre')}}">
                </div>
                <div class="form-group">
                    <label for="descripcion"> Descripcion </label>
                    <textarea class="form-control" id="descripcion" name="descripcion"  value="{{old('descripcion')}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="precio"> Precio </label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{old('precio')}}">
                </div>
                <div class="form-group">
                    <label for="cantidad"> Cantidad </label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad"  value="{{old('cantidad')}}">
                </div>
                <div class="form-group">
                    <label for="imagen"> Imagen </label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/png, image/jpeg, image/jpg"  value="{{old('imagen')}}" >
                </div>
                    
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
          </div>
        </div>
        <div class="col-md text-center">
        <br><br>
            <img class="a" src="{{asset('images/caja.png') }}">
        </div>
    </div>
</div>
@endsection