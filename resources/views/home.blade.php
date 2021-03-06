@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10">
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
      </div>
      <div class="col-md-2">
        @if(Auth::user()->role == 1)
            <div class="row text-right pr-4">
                <a class="btn btn-success" href="{{route('crearProducto')}}">  Agregar producto</a> &nbsp;&nbsp; &nbsp;&nbsp;
            </div>    
            <br>
        @endif 
      </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading text-center">
            CATALOGO
        </div>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <ul id="producto-list">
                @foreach ($productos as $prod)
                    <div class="row">
                        <div class="panel panel-size panel-default mr-4">  
                            <div class="panel">
                                @if(Auth::user()->role == 1)
                                    <div class="pull-right">  
                                        <a class="btn btn-primary" title="Ver comentarios" href="{{route('producto', ['id' => $prod->id])}}" >  <img src="{{ asset('images/chat.png') }}">  </a>
                                        <a class="btn btn-danger"  title="Eliminar producto" href="#elimnarModal{{$prod->id}}" data-toggle="modal">  <img src="{{ asset('images/delete.png') }}">  </a>
                                        <a class="btn btn-warning" title="Editar producto" href="{{route('editarProducto', ['id' => $prod->id])}}">  <img src="{{ asset('images/edit.png') }}"> </a>    
                                    </div>
                                @endif
                            </div>
                            <a  href="{{route('producto', ['id' => $prod->id])}}"  class="panel-body pointer" style="color: rgb(56, 56, 56)">
                                <div class="row">
                                    <div class="col-md-3 text-center">
                                        @if(Storage::disk('images')->has($prod->image))
                                            <img class="producto-imagen" height="100px" width="auto" src="{{url('/imagen/'.$prod->image)}}" alt="{{$prod->name}}">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="col-md-12">
                                            <h4><b>{{$prod->name}}</b></h4>
                                        </div>
                                        <div class="col-md-12">
                                            <p>
                                                {{$prod->description}}
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <label> Cantidad:  {{$prod->quantity}} </label>  	 &nbsp;&nbsp;&nbsp;&nbsp;
                                            <label> Precio: L {{number_format( $prod->price, 2, '.', '')}} </label>
                                        </div>
                                    </div>
                                </div>      
                            </a>
                        </div> 
                    </div>


                   
                    <!--Modal eliminar -->
                   
                    <!-- Modal / Ventana / Overlay en HTML -->
                    <div id="elimnarModal{{$prod->id}}" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">??Est??s seguro?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>??Seguro que quieres borrar el producto {{$prod->name}}?</p>
                                    <p class="text-warning"><small>Si lo borras, nunca podr??s recuperarlo.</small></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                    <a href="{{url('/borrar-producto/'.$prod->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </ul> 

        </div>
        <div class="panel-footer"> {{$productos->links()}}</div>
    </div>
</div>   
@endsection
