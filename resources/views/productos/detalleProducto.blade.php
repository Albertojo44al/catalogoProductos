@extends('layouts.app')

<br><br><br><br>
@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-3">
      @if(Storage::disk('images')->has($producto->image))
      <img class="card-img-top producto-imagen" width="100%" height="150px" src="{{url('/imagen/'.$producto->image)}}" alt="{{$producto->name}}">
      @endif
    </div>
    <div class="col-md-8">
      <div class="row">
        <h4><b>{{$producto->name}}</b></h4>
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
</div>

{{-- <div class="panel panel-default">
   <div class="panel-heading">
    COMENTARIOS 
   </div>
   <div class="panel-body">
      @if(isset($producto->comentarios))
        @foreach ($producto->comentarios as $comentario)
          <div class="row">
            {{$comentario->name}}
          </div>
        @endforeach
      @endif
   </div>
</div> --}}


@endsection
