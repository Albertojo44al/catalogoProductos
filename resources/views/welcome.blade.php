@extends('layouts.app')



@section('content')
<br><br>

<div class="row pt-5 text-center">
  <img class="card-img-top descripcion-imagen" src="{{ asset('images/fondo.jpg') }}" alt="imagen de fondo" width="85%" height="20%">
</div>
<hr>

<div class="container">
  
  <div class="row">
    <div class="col-md-10">
      @if(session('message'))
      <div class="alert alert-success">
          {{session('message')}}
      </div>
      @endif
      @if(session('carrito'))
      <div class="alert alert-success">
          ¡Producto agregado al carrito!
      </div>
      @endif
    </div>
  </div>
  <br><br>
  @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <div class="container">
    <ul id="producto-list">
      @foreach ($productos as $prod)
    
        <div class="col-md-4">
            <div class="panel panel-size panel-default card-height">  
                <div class="panel">
                        <div class="text-right">
                            <a class="btn btn-success" href="{{route('carrito')}}">  <img src="{{ asset('images/carrito-de-compras.png') }}"></a>
                        </div>
                </div>
                
                @if(Storage::disk('images')->has($prod->image))
                    <div data-toggle="modal" data-target="#modalDetalle{{$prod->id}}" class="img-mask pointer">
                        <img class="card-img-top producto-imagen" src="{{url('/imagen/'.$prod->image)}}" alt="Card image cap">
                    </div>    
                @endif
                <div data-toggle="modal" data-target="#modalDetalle{{$prod->id}}"  class="panel-body text-center pointer">
                   
                    <hr>
                    <h4>{{$prod->name}}</h4>  
                    <label> Cantidad:  {{$prod->quantity}} </label>  	 &nbsp;&nbsp;&nbsp;&nbsp;
                    <label> Precio: L {{number_format( $prod->price, 2, '.', '')}} </label> 
                </div>
            </div> 
        </div>
          <!-- Modal visualizar -->
        <div class="modal fade" id="modalDetalle{{$prod->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetalle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-content">
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
                                <h1> {{$prod->name}} <h1>
                              </div>
                              @if(Storage::disk('images')->has($prod->image))
                                <div class="img-mask-descripcion pointer">
                                    <img class="card-img-top descripcion-imagen" src="{{url('/imagen/'.$prod->image)}}" alt="Card image cap">
                                </div>    
                              @endif
                                <br><br>
                              <label>
                                  Precio: {{number_format( $prod->price, 2, '.', '')}}
                              </label>&nbsp;&nbsp;&nbsp;
                              <label>
                                  Cantidad: {{$prod->quantity}}
                              </label>
                              <p> {{$prod->description}}</p>    
                            </div>
                            <div class="col-md-2">
                              <div class="pull-right">
                                <a class="btn btn-success" href="{{route('carrito')}}">  <img src="{{ asset('images/carrito-de-compras.png') }}"></a>
                              </div>
                            </div>    
                          </div>
                            <br><br>
                            <div class="row">
                              @include('productos.comentarios')
                            </div>
                          </div>
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
@endsection
