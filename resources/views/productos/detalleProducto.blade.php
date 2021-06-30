

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body text-center">
  <div class="row ">
    <div class="col-md-2">
    
    </div>
    <div class="col-md-8">
      <div class="panel">
        <h1> {{$producto->name}} <h1>
      </div>
      @if(Storage::disk('images')->has($producto->image))
        <div class="img-mask-descripcion pointer">
            <img class="card-img-top descripcion-imagen" src="{{url('/imagen/'.$producto->image)}}" alt="Card image cap">
        </div>    
      @endif
        <br><br>
      <label>
          Precio: {{number_format( $producto->price, 2, '.', '')}}
      </label>&nbsp;&nbsp;&nbsp;
      <label>
          Cantidad: {{$producto->quantity}}
      </label>
      <p> {{$producto->description}}</p>

     
    </div>
    <div class="col-md-2">
      <div class="pull-right">
        <a class="btn btn-success" href="{{route('carrito')}}">  <img src="{{ asset('images/carrito-de-compras.png') }}"></a>
      </div>
    </div>
    
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-primary" data-dismiss="modal"> Cerrar</button>
</div>