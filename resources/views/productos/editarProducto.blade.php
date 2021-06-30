@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
        
        <div class="card">
            <div class="card-header text-center col-lg-7">
                <h2>Editar {{$producto->name}}</h2>
                <hr>
            </div>
            <div class="card-body text-center">
                <form action="{{ route('modificarProducto',['id'=> $producto->id ])}}" method="POST" enctype="multipart/form-data" class="col-lg-7">
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
                    <input type="text" class="form-control" id="nombre" name="nombre"  value="{{$producto->name}}">
                </div>
                <div class="form-group">
                    <label for="descripcion"> Descripcion </label>
                    <textarea class="form-control" id="descripcion" name="descripcion"  >{{$producto->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="precio"> Precio </label>
                    <input type="number" class="form-control" id="precio" name="precio" value="{{$producto->price}}">
                </div>
                <div class="form-group">
                    <label for="cantidad"> Cantidad </label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad"  value="{{$producto->quantity}}">
                </div>
                <div class="form-group">
                    <div class="img-mask-edit">
                        <img class="producto-imagen" src="{{url('/imagen/'.$producto->image)}}">
                    </div>    
                    <label for="imagen"> Imagen </label>
                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/png, image/jpeg, image/jpg"  value="{{$producto->image}}" >
                </div>
                    <button type="submit" class="btn btn-primary btn-lg">Editar</button>
                </form>
            </div>
        </div>
        </div>
        <div class="col-md text-center">
          <br><br><br><br><br><br>
          <img class="a" src="{{ asset('images/documento.png') }}">
        </div> 
    </div>
</div>
@endsection