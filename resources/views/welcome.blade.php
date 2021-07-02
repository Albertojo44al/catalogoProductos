@extends('layouts.app')


@section('content')
  
  <div id="myCarousel" class="carousel slide background-image" data-ride="carousel">
      <!-- Indicators -->
    
      <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="{{ asset('images/fondo.jpg')}}"  alt="" style="width:100%;  height:450px">
        </div>
  
        <div class="item">
            <img src="{{ asset('images/fondo1.png')}}" alt="" style="width:100%; height:450px">
        </div>
  
        <div class="item">
            <img src="{{ asset('images/fondo2.jpg')}}" alt="" style="width:100%; height:450px">
        </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
  
    </a>
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
        @foreach ($productos as $producto)
    
          <div class="col-md-4">
            <div class="panel panel-size panel-default card-height">  
                <div class="panel">
                  
                </div>
                
                @if(Storage::disk('images')->has($producto->image))
                    <div data-toggle="modal" data-target="#modalDetalle{{$producto->id}}" class="img-mask pointer text-center">
                        <img class="producto-imagen" src="{{url('/imagen/'.$producto->image)}}" alt="Card image cap">
                    </div>    
                @endif
                <div data-toggle="modal" data-target="#modalDetalle{{$producto->id}}"  class="panel-body text-center pointer">
                  
                    <hr>
                    <h4>{{$producto->name}}</h4>  
                    <label> Cantidad:  {{$producto->quantity}} </label>  	 &nbsp;&nbsp;&nbsp;&nbsp;
                    <label> Precio: L {{number_format( $producto->price, 2, '.', '')}} </label> 
                </div>
            </div> 
          </div>
          <!-- Modal visualizar -->
          <div class="modal fade" id="modalDetalle{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDetalle" aria-hidden="true">
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
                              <h1> {{$producto->name}} <h1>
                            </div>
                            @if(Storage::disk('images')->has($producto->image))
                              <div class="img-mask-descripcion pointer">
                                  <img class="descripcion-imagen" src="{{url('/imagen/'.$producto->image)}}" alt="Card image cap">
                              </div>    
                            @endif
                            <br><br>
                            <label>
                                Precio: {{number_format( $producto->price, 2, '.', '')}}
                            </label>&nbsp;&nbsp;&nbsp;
                            <label>
                                Cantidad: {{$producto->quantity}}
                            </label>
                            <p> 
                              {{$producto->description}}
                            </p>    
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


 
