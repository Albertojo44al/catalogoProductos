@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card col-md-12">
                    <div class="card-header text-center col-lg-12">
                        <h2>Editar {{$producto->name}}</h2>
                        <hr>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('modificarProducto',['id'=> $producto->id ])}}" method="POST" enctype="multipart/form-data" class="col-lg-12">
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
                        
                        <div class="row">
                            <div class="col-md-5">
                                <br><br>
                                <div class="form-group">
                                    <img class="producto-imagen" src="{{url('/imagen/'.$producto->image)}}" style="height: 200px; max-width:340px"><br>
                                    <label for="imagen"> Imagen </label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/png, image/jpeg, image/jpg"  value="{{$producto->image}}" >
                                </div>
                            </div>

                            <div class="col-md-7">
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
                            </div>
                        </div>

                            <button type="submit" class="btn btn-primary btn-lg pull-right">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection