@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-3">
      @if(Storage::disk('images')->has($producto->image))
        <img class="card-img-top producto-imagen" width="100%" height="150px" src="{{url('/imagen/'.$producto->image)}}" alt="{{$producto->name}}">
      @endif
    </div>
    <div class="col-md-8">
      <div class="row">
        <h4>
          <b>
            {{$producto->name}}
          </b>
        </h4>
      </div>
      <div class="row">
        <p>
          {{$producto->description}}
        </p>
      </div>
      <div class="row">
        <label> Cantidad:  {{$producto->quantity}} </label>  	 &nbsp;&nbsp;&nbsp;&nbsp;
        <label> Precio: L {{number_format( $producto->price, 2, '.', '')}} </label>
      </div>
    </div>
  </div> 

  <hr>

  <div class="comments-container">
    <div class="panel panel-default">
      <div class="panel-heading">
        COMENTARIOS 
      </div>
      <div class="panel-body">
          @if(isset($producto->comentarios))
            @foreach ($producto->comentarios as $comentario)
              <div class="row">
                <div class="col-md-3 comment-box">
                  <img src="{{asset('images/profile-user.png')}}" width="50px" alt="">&nbsp;     
                  <b>{{$comentario->name}}</b>
                </div>
                <div class="col-md-9 padding ">
                  <div class="row">
                    <div class="col-md-12">
                      <p>{{$comentario->comment}}</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9">

                    </div>
                    <div class="col-md-3">
                      <em class="pull-left">
                        {{$comentario->email}}<br>
                        {{$comentario->created_at}}
                      </em>
                    </div>                
                  </div>
                </div>
              </div>
              <hr>
            @endforeach
          @endif
      </div>
    </div>
  </div>

@endsection
