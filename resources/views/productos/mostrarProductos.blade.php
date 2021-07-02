
<div class="container">
    @if ($productos->isEmpty())
        <h3> Lo sentimos, no encontramos resultados para </h3>
        <h3 class="text-success"><b>{{$search}}</b></h3>
    @endif

    <div class="container">
        <ul id="producto-list">
            @foreach ($productos as $producto)
                <div class="row">
                    <div class="panel panel-size panel-default mr-4">  
                        <div class="panel">
                            @if(Auth::user()->role == 1)
                                <div class="pull-right">  
                                    <a class="btn btn-primary" title="Ver comentarios" href="{{route('producto', ['id' => $producto->id])}}" >  <img src="{{ asset('images/chat.png') }}">  </a>
                                    <a class="btn btn-danger"  title="Eliminar producto" href="#elimnarModal{{$producto->id}}" data-toggle="modal">  <img src="{{ asset('images/delete.png') }}">  </a>
                                    <a class="btn btn-warning" title="Editar producto" href="{{route('editarProducto', ['id' => $producto->id])}}">  <img src="{{ asset('images/edit.png') }}"> </a>    
                                </div>
                            @endif
                        </div>
                        <a  href="{{route('producto', ['id' => $producto->id])}}"  class="panel-body pointer" style="color: rgb(56, 56, 56)">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    @if(Storage::disk('images')->has($producto->image))
                                        <img class="producto-imagen" height="100px" width="auto" src="{{url('/imagen/'.$producto->image)}}" alt="{{$producto->name}}">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div >
                                        <h4><b>{{$producto->name}}</b></h4>
                                    </div>
                                    <div >
                                        <p>
                                            {{$producto->description}}
                                        </p>
                                    </div>
                                    <div >
                                        <label> Cantidad:  {{$producto->quantity}} </label>  	 &nbsp;&nbsp;&nbsp;&nbsp;
                                        <label> Precio: L {{number_format( $producto->price, 2, '.', '')}} </label>
                                    </div>
                                </div>
                            </div>      
                        </a>
                    </div> 
                </div>


               
                <!--Modal eliminar -->
               
                <!-- Modal / Ventana / Overlay en HTML -->
                <div id="elimnarModal{{$producto->id}}" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">¿Estás seguro?</h4>
                            </div>
                            <div class="modal-body">
                                <p>¿Seguro que quieres borrar el producto {{$producto->name}}?</p>
                                <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <a href="{{url('/borrar-producto/'.$producto->id)}}" type="button" class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>

            @endforeach
        </ul> 
      </div>
    <div class="row">
    <div class="panel-footer"> {{$productos->links()}}</div>
    </div>
  </div>